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
	@if(Auth::user()->type == "Administrador")
	<div class="row">
		<div class="col-md-3 col-md-offset-9" style="text-align: center; padding-bottom: 10px;">
			<a class="btn btn-info" href="{{ route('events.form', ['id' => $event->id]) }}">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				&nbsp; Editar Evento
			</a>
		</div>
	</div>
	@endif
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;Detalles del evento</h2>

		</header>
		<div class="panel-body">
				<div class="form-group">
					{!! Form::label('titulo', 'Titulo del evento:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('titulo', $event->title)!!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('start', 'Fecha de Inicio:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('start', $event->start)!!}	
					</div>
				</div>

				@if($event->end != '0000-00-00 00:00:00') 
					<div class="form-group">
						{!! Form::label('end', 'Fecha de Inicio:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
						<div class="col-sm-7">
							{!! Form::label('end', $event->end)!!}	
						</div>
					</div>
				@endif

				<div class="form-group">
					{!! Form::label('all_day', 'Todo el día:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('all_day', ($event->all_day ? 'Sí' : 'No'))!!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('color', 'Color del evento:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}	

					<div class="col-sm-7">
						<p style="font-size: 1.2em;	">Color seleccionado: &nbsp;
							{!! Form::button('Evento', ['id' => 'color-picker', 'class' => 'btn btn-primary btn-flat', 'style' => 'border-radius: 5px;width: 120px;border-color: ' . $event->color . ';background-color: ' . $event->color]) !!}
						</p>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('credits', 'Créditos:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('credits', '&nbsp;' . $event->credits)!!}
					</div>
				</div>

				<legend></legend>

				<div class="form-group">
					{!! Form::label('place', 'Lugar:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('place', ($event->place ? $event->place : 'No disponible')) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('address', 'Dirección:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('address', ($event->address ? $event->address : 'No disponible')) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('speaker', 'Ponente:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('speaker', ($event->speaker ? $event->speaker : 'No disponible')) !!}	
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('institution', 'Institución:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}
					<div class="col-sm-7">
						{!! Form::label('institution', ($event->institution ? $event->institution : 'No disponible')) !!}	
					</div>
				</div>

				<legend></legend>

					
				<div class="form-group">
					{!! Form::label('exam', 'Examen:', ['class' => 'control-label col-sm-2  col-sm-offset-2']) !!}	
					<div class="col-sm-7">
						@if($event->exam != NULL)
							{!! Form::label('exam', $event->exam) !!} &nbsp;
							<a href="#" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Realizar Examen</a>
						@else
							{!! Form::label(null, 'Examen no disponible', ['style' => 'color: #bbb;']) !!}
						@endif
					</div>
				</div>
		</div>
	</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{
		$('label:contains("No disponible")').css('color', '#bbb');
	});

</script>
@endsection