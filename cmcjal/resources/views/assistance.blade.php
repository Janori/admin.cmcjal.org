@extends('layouts.main')

@section('title')
	CMCJAL Admin
@endsection

@section('pageHeader')
	<header class="page-header">
		<h2>Asistencia</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>	
					<a href="{{ url('/') }}">
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
					{{ Form::hidden('event_id', null, ['id' => 'event_id']) }}
					<input type="text" id="search-event" class="form-control" name="search" placeholder="Search..." autocomplete="on" minlength="4">
					<span class="input-group-btn">
						<button class="btn btn-default-sm" type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</span>
				</div>

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
			</div>
		</div>
	</section>
	{!! Form::open(['url' => ['getEventInfo', '_EVENT_ID'], 'method' => 'POST', 'id' => 'event-info'])!!}
	{!! Form::close() !!}
@endsection


@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{

	$('#search-event').autocomplete({
		source : '{{ url('eventSearch') }}',
		minLength : 3,
		select: function( event, ui )
			{
				var id 		= ui.item.value;
				var form 	= $('#event-info');
				var url 	= form.attr('action').replace('_EVENT_ID', id); 
				var data 	= form.serialize();

				$.post(url, data, function(response)
				{
					$('.column-text')[0].innerHTML = response.title;
					$('.column-text')[1].innerHTML = response.start;
					$('.column-text')[2].innerHTML = response.end;
					$('.column-text')[3].innerHTML = response.all_day == 1 ? "Sí" : "No";

					$('.event-info').fadeIn();
				});
			},
		change: function( event, ui ) {
			console.log(ui.item.value);
		}
	});
});
</script>
@endsection