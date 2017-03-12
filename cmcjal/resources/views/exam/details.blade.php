@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Calendario / Examen del evento</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>	
					<a href="{{ url('/') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Calendario / Examen del Evento</span></li>
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

				<h2 class="panel-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp; Examen del Evento</h2>

		</header>
		<div class="panel-body">
			{!! Form::open(['route' => ['exam.store', $event_id], 'method' => 'POST',	'class' => 'form-horizontal']) !!}
				{!! Form::hidden('event_id', $event_id, ['id' => 'event_id']) !!}
				<div class="form-group box-body">
					{!! Form::label('nombre', 'Título:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::text('exam', $exam, ['class' => 'form-control', 'placeholder' => 'Tíutlo del examen']) !!}
					</div>
				</div>

				<div class="form-group box-body">
					{!! Form::label('question', 'Preguntas:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}&nbsp;
					<a href="#" class="btn btn-info create-question"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar Pregunta</a>
				</div>

				<div class="form-group box-body">
					<div class="col-sm-8 col-md-offset-2 box-body questions">
						<table class="table table-hover table-striped">
							<thead>
								<th>Titulo</th>
								<th>Acciones</th>
							</thead>
							<tbody>
								
							@foreach($question as $question)
						
								<tr data-id="{{ $question->id }}">
									<td>{{ $question->title }}</div>
									<td class="col-md-4">
										<a href="#" class="btn btn-primary edit-question"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href="#" class="btn btn-danger btn-delete delete-question"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								</tr>

							@endforeach
							</tbody>
						</table>
					</div>
				</div>


				{!! Form::submit('Guardar', ['class' => 'col-md-offset-1 btn btn-primary btn-lg pull-right', 'style' => 'margin-right: 15px; margin-top: 10px;']) !!}

			{!! Form::close() !!}
		</div>
	</section>
	<!-- Quesion Modal -->
	<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Pregunta No. <span class="number-question"></span>:</h4>
				</div>
				<!-- Modal Body -->
				<div class="modal-body">
					{!! Form::hidden('type', null, ['id' => 'type']) !!}
					{!! Form::hidden('id_question', null, ['id' => 'id_question']) !!}
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Título </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" placeholder="Título de la pregunta"/>
							</div>	
						</div>
						<legend></legend>
						@foreach(['A', 'B', 'C', 'D'] as $option)
						<div class="form-group">
							<label for="awnser_{{ $option }}" class="col-sm-2 control-label">Opción {{ $option }}</label>
							<div class="col-sm-10">
								<input type="text" class="form-control question-option" placeholder="Escribe la opción"/>
							</div>	
						</div>
						@endforeach
						<div class="form-group">
							<label for="correct" class="col-sm-2 control-label">Opción correcta</label>
							<div class="col-sm-10">
								<select id="correct">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
								</select>
							</div>
						</div>
						<legend></legend>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-8">
								<button type="submit" class="btn btn-primary send-question">Guardar información</button>
							</div>
						</div>
					</form>
				</div>
				{{-- <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div> --}}
			</div>

		</div>
	</div>
@endsection


@section('scripts')
{!! Html::script(asset('assets/javascripts/json2.js')) !!}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.create-question').click(function(event) {
			event.preventDefault();
			$('.number-question').html($('.questions tbody').children().length + 1);
			$('#type').val('create');
			$('#modal').modal();
			$('.modal form')[0].reset();
		});

		$('.edit-question').click(function(event) {
			event.preventDefault();
			// Quizá después implemente una busqueda binaria para reducir complejidad a O(log n);
			var row = $(this).parents('tr')[0];

			for(var i = 0; i < $('.questions tr').length; i++)
				if(row == $('.questions tr')[i])
				{
					$('.number-question').html(i);
					break;
				}
			
			$('#type').val('edit');

			var id 		= $(this).parents('tr').data('id');
			var form 	= $('#event-info');
			var url 	= '{{ route('question.show', ['id' => ':EVENT_ID']) }}';
				url 	= url.replace(':EVENT_ID', id); 
			var data 	= {'_token' : '{{ csrf_token() }}'};

			$.get(url, data, function(response)
			{
				$('#id_question').val(id);
				$('#title').val(response.title);

				var options = $.parseJSON(response.options);
				for(var i = 0; i < options.length; i++)
					$($('.question-option')[i]).val(options[i]);

				$('#correct').val(response.correct);
			});

			$('#modal').modal();
			$('.modal form')[0].reset();
		});

		$('.send-question').click(function(event) {
			event.stopPropagation();
			event.preventDefault();
			$('#modal').modal('hide');

			var options = [];
			for(var i = 0; i < $('.question-option').length; i++)
				options.push($($('.question-option')[i]).val());

			var data = {
				event_id	: $('#event_id').val(),
				title 		: $('#title').val(),
				options		: JSON.stringify(options),		
				correct 	: $('#correct').val()
			};

			switch($('#type').val())
			{
				case 'create':
					var url = '{{ route('question.store') }}';

					$.ajax({
						url: url,
						type: 'POST',
						data: data,
						headers: {
							"X-CSRF-TOKEN": '{{ csrf_token() }}'
						},
					})
					.done(function(response) {
						console.log(response);
						var container = $('.questions tbody');

						var div = $('<tr data-id="' + response + '">')
								  .append('<td>' + data.title + '</td>')
         						  .append('<td><a href="#" class="btn btn-primary edit-question"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="#" class="btn btn-danger btn-delete delete-question"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>"')
         						  .appendTo(container);

					});
					
					break;

				case 'edit':
					var url = '{{ route('question.update', ['id' => ':USER_ID']) }}';
						url = url.replace(':USER_ID', $('#id_question').val());

					$.ajax({
						url: url,
						type: 'PUT',
						data: data,
						headers: {
							"X-CSRF-TOKEN": '{{ csrf_token() }}'
						},
					})
					.done(function(response) {

         				$('tr[data-id="' + response + '"]').find('td').first().html(data.title);
					});

					break;
			}
		});

		$('.delete-question').click(function(event) {
			event.preventDefault();

			if(!confirm('¿Seguro que deseas eliminar la pregunta?'))
				return;

			var row = $(this).parents('.row');

			var id 		= $(this).parents('.row').data('id');
			var form 	= $('#event-info');
			var url 	= '{{ route('question.delete', ['id' => ':EVENT_ID']) }}';
				url 	= url.replace(':EVENT_ID', id); 
			var data 	= {'_token' : '{{ csrf_token() }}', '_method' : 'DELETE'};

			$.post(url, data, function(response)
			{
				bootbox.alert(response);

				row.fadeOut();
				row.remove();
			});
		});
	});
</script>
@endsection