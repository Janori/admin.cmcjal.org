@extends('layouts.main')

@section('title')
	CMCJAL Admin
@endsection

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
			@if(Auth::user()->type == "Administrador")

			{!! Form::model($event, ['url' => ['events/edit', $event->id], 'method' => 'PUT']) !!}
				<div class="form-group">
					{!! Form::label('titulo', 'Titulo del evento:') !!}
					<div class="box-body">
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el titulo para este evento']) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('color', 'Color del evento:') !!}	
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
					</div>

					<div class="box-body">
						<p style="font-size: 1.5em;	">Color seleccionado: &nbsp;
							{!! Form::button('Evento', ['id' => 'color-picker', 'class' => 'btn btn-primary btn-flat', 'style' => 'border-radius: 5px;width: 120px;border-color: ' . $event->color . ';background-color: ' . $event->color]) !!}
						</p>
					</div>
				</div>

				<div class="box-body pull-right">
					{!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary', 'style' => 'margin-right: 15px;']) !!}
					{!! Html::link('#', 'Eliminar Evento', ['id' => 'delete-button', 'class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}

			{!! Form::open(['url' => ['events/delete', $event->id],  'method' => 'DELETE']) !!}
				{!! Form::submit('Eliminar Evento', ['class' => 'btn btn-danger hidden']) !!}
			{!! Form::close()!!}

			@else
				<div class="form-group">
					{!! Form::label('titulo', 'Titulo del evento:') !!}
					<div class="box-body">
						{!! Form::label('titulo', $event->title)!!}	
					</div>

					<div class="form-group">
					{!! Form::label('color', 'Color del evento:') !!}	

					<div class="box-body">
						<p style="font-size: 1.5em;	">Color seleccionado: &nbsp;
							{!! Form::button('Evento', ['id' => 'color-picker', 'class' => 'btn btn-primary btn-flat', 'style' => 'border-radius: 5px;width: 120px;border-color: ' . $event->color . ';background-color: ' . $event->color]) !!}
						</p>
					</div>
				</div>
				</div>

			@endif
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

			$('.btn.btn-danger.hidden').click();
		});
	});
</script>
@endsection