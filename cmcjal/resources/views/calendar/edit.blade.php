@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Calendario / Detalles del evento</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>	
					<a href="{{ url('/') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Calendario / Detalles</span></li>
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

				<h2 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;Detalles del evento</h2>

		</header>
		<div class="panel-body">

{!! Form::model($event, ['route' => ['events.edit', $event->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

				<div class="form-group">
					{!! Form::label('titulo', 'Titulo del evento:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-7">
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el titulo para este evento']) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('color', 'Color del evento:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}	
					{!! Form::hidden('color') !!}
					<div class="box-body">
						<ul class="fc-color-picker" id="color-chooser">
							<li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
							<li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
						</ul>
						&nbsp;
						{!! Form::button('&nbsp;', ['id' => 'color-picker', 'class' => 'btn btn-primary btn-flat', 'style' => 'border-radius: 5px;width: 120px;border-color: ' . $event->color . ';background-color: ' . $event->color]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('credits', 'Créditos:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-2">
						{!! Form::number('credits', null, ['class' => 'form-control', 'min' => '1']) !!}
					</div>
				</div>
				<legend></legend>

				<div class="form-group">
					{!! Form::label('place', 'Lugar:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-7">
						{!! Form::text('place', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el lugar para este evento']) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('address', 'Dirección:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-7">
						{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la dirección para este evento']) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('speaker', 'Ponente:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-7">
						{!! Form::text('speaker', null, ['class' => 'form-control', 'placeholder' => 'Ingresa nombre del ponente']) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('institution', 'Institución:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}
					<div class="col-sm-7">
						{!! Form::text('institution', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la institución del ponente']) !!}	
					</div>
				</div>

				<legend></legend>
	
				<div class="form-group">
					{!! Form::label('exam', 'Examen:', ['class' => 'control-label col-sm-2  col-sm-offset-1']) !!}	
					<div class="box-body">
						@if($event->exam == NULL)
							<a href="{{ route('exam.create', ['event_id' => $event->id]) }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Examen</a>
						@else
							{!! Form::label('exam', '"'. $event->exam . '"', ['style' => 'font-weight: bold;']) !!}&nbsp;
							<a href="{{ route('exam.create', ['event_id' => $event->id]) }}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;Editar Examen</a>
						@endif
					</div>
				</div>


				<div class="box-body pull-right">
					{!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary', 'style' => 'margin-right: 15px;']) !!}
					{!! Html::link('#', 'Eliminar Evento', ['id' => 'delete-button', 'class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}

			{!! Form::open(['route' => ['events.delete', $event->id],  'method' => 'DELETE']) !!}
				{!! Form::submit('Eliminar Evento', ['class' => 'btn btn-danger hidden']) !!}
			{!! Form::close()!!}
		</div>
	</section>
@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{
		var currColor = "#3c8dbc"; //Red by default

		$("#color-chooser > li > a").click(function (e) {
			e.preventDefault();
			//Save color
			currColor = $(this).css("color");
			//Add color effect to button
			$('#color-picker').css({"background-color": currColor, "border-color": currColor});
			$('input[name="color"]').val(currColor);
		});

		$('#delete-button').click(function(event) {
			event.preventDefault();

			if(!confirm('¿Está seguro que desea eliminar el evento?'))
				return;

			$('.btn.btn-danger.hidden').click();
		});
	});
</script>
@endsection
