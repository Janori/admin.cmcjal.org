@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Asistencia</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{ route('admin.index') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Asistencia</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
@endsection

@section('content')
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Auditorio de asistencia</h2>

		</header>
		<div class="panel-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="input-group custom-search-form">
					{!! Form::hidden('event_id', null, ['id' => 'event_id']) !!}
					<input type="text" id="search-event" class="form-control" name="search" placeholder="Buscar evento..." autocomplete="on" minlength="4">
					<span class="input-group-btn">
						<button class="btn btn-default-sm" type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</span>
				</div>

				<div class="assistance-module">
					<div class="event-info table-responsive">
						<table class="table">
							<thead>
								<th colspan="2" style="text-align: center; font-size: 1.3em;">Información del evento</th>
							</thead>
							@foreach(['Titulo', 'Fecha de Inicio', 'Fecha de Fin', 'Todo el día'] as $head)
							<tr>
								<td class="column-name">{{ $head }}</td>
								<td class="column-text"></td>
							</tr>
							@endforeach
						</table>
	 				</div>

	 				<div class="input-group user-search-form">
						<input type="text" id="search-user" class="form-control" name="search" placeholder="Buscar usuario..." autocomplete="on" minlength="4">
						<span class="input-group-btn">
							<button class="btn btn-default-sm" type="submit">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</span>
					</div>

					<div class="users-info table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<th>ID</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Modalidad</th>
								<th>Acciones</th>
							</thead>
							<tbody>
							</tbody>
						</table>
	 				</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{
	$( "#search-event" ).keyup(function() {
  		if($(this).val() == "")
  		{
  			$('.assistance-module').fadeOut();
  			$('#search-user').val();
  		}
	});

	$('#search-event').autocomplete({
		source : '{{ route('assistance.event') }}',
		minLength : 3,
		autoFocus: true,
		select: function( event, ui )
		{
			$('#event_id').val(ui.item.value);

			var id 		= ui.item.value;
			var form 	= $('#event-info');
			var url 	= '{{ route('assistance.events', ['id' => ':EVENT_ID']) }}';
				url 	= url.replace(':EVENT_ID', id);
			var data 	= {'_token' : '{{ csrf_token() }}'};

			$(this).focusout();

			$.post(url, data, function(response)
			{
				$('.column-text')[0].innerHTML = response.title;
				$('.column-text')[1].innerHTML = response.start;
				$('.column-text')[2].innerHTML = response.end;
				if(response.all_day)
					$($('.column-text')[2]).parents('tr').hide();
				else
					$($('.column-text')[2]).parents('tr').show();

				$('.column-text')[3].innerHTML = response.all_day == 1 ? "Sí" : "No";

				var url 	= '{{ route('assistance.users', ['id' => ':EVENT_ID']) }}';
					url 	= url.replace(':EVENT_ID', id);

				var data 	= {'_token' : '{{ csrf_token() }}'};
				$.post(url, data, function(response)
				{
					console.log(response);
					var container = $('.users-info tbody')
						container.empty();
					if(response.length)
					{
						for(var i = 0; i < response.length; i++)
						{
							var tr = $('<tr data-id="' + response[i].id + '">');
							for(var a in response[i])
							{
								tr.append('<td>' + response[i][a] + '</td>');
							}
							tr.append('<td><a href="#" class="btn btn-danger btn-delete"> Eliminar </a></td>');
							tr.appendTo(container);

							$('.btn-delete').click(elimiarAsistencia);
						}
					}
					else
					{
						var tr = $('<tr>');
						tr.append('<td colspan="5" style="text-align: center;"> No se encontraron usuarios registrados </td>').appendTo(container);
					}
				});

				$('.assistance-module').fadeIn();
			});
		}
	});

	$('#search-user').autocomplete({
		source : '{{ route('assistance.user') }}',
		minLength : 3,
		autoFocus: true,
		select: function( event, ui )
		{
			if(!confirm('¿Está seguro que desea registrar al usuario ' + ui.item.label + '?'))
				return;

			var url = '{{ route('assistance.store') }}';
			var data = {
				event_id 	: $('#event_id').val(),
				user_id		: ui.item.value
			};

			$.ajax({
				url: url,
				type: 'POST',
				data: data,
				headers: {
					"X-CSRF-TOKEN": '{{ csrf_token() }}'
				}
			})
			.done(function(response) {

				if(response.length)
				{
					var container = $('.users-info tbody')

					if($('.users-info table td').length == 1)
						container.empty();

					var tr = $('<tr data-id="' + response[0].id + '">');

					tr.append('<td>' + response[0].id + '</td>')
					  .append('<td>' + response[0].name + '</td>')
					  .append('<td>' + response[0].lastname + '</td>')
					  .append('<td> Presencial </td>')
					  .append('<td><a href="#" class="btn btn-danger btn-delete"> Eliminar </a></td>')
					  .appendTo(container);

					$('.btn-delete').click(elimiarAsistencia);
				}
				else
					bootbox.alert('Este usuario ya se encuentra registrado');
			});

		}
	});

	function elimiarAsistencia(event)
	{
		event.preventDefault();

		if(!confirm('¿Está seguro que desea elimiar la asistencia?\nLos créditos obtenidos se elminiarán'))
			return;

		var tr = $(this).parents('tr');

		var url		= '{{ route('assistance.delete') }}';
		var data 	= {
			user_id 	: tr.data('id'),
			event_id 	: $('#event_id').val()
		};

		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			headers: {
				"X-CSRF-TOKEN": '{{ csrf_token() }}'
			},
		})
		.done(function(response) {
			tr.fadeOut();
			tr.remove();

			if($('.users-info table td').length == 0)
				$('.users-info tbody').append('<td colspan="5" style="text-align: center;"> No se encontraron usuarios registrados </td>');

			bootbox.alert(response);

		});

	}
});
</script>
@endsection
