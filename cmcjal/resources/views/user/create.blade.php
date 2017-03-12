@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Usuarios / Crear nuevo usuario</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>	
					<a href="{{ url('/') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Agregar Usuario</span></li>
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

				<h2 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Crear usuario</h2>

		</header>
		<div class="panel-body">
			{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
				<div class="form-group box-body">
					{!! Form::label('nombre', 'Nombre:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del usuario']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('apellido', 'Apellido:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el apellido del usuario']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('correo', 'Correo electrónico:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo del usuario']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('contrasena', 'Contraseña:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingresa la contraseña del usuario']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('tipo', 'Tipo de usuario:', ['class' => 'col-sm-2 col-md-offset-1 control-label']) !!}
					<div class="col-sm-7">
						{!! Form::select('type', array_flip(config('constants.USER_TYPE')), null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="checkbox">
						<label for="status" class="col-sm-2 col-md-offset-2 control-label">
							<input type="checkbox" name="status" value="1" checked> ¿Usuario activo?
						</label>
					</div>
				</div>

				{!! Form::submit('Guardar Usuario', ['class' => 'col-md-offset-1 btn btn-primary ', 'style' => 'margin-right: 15px; margin-top: 10px;']) !!}

			{!! Form::close() !!}
		</div>
	</section>
@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{
	});
</script>
@endsection