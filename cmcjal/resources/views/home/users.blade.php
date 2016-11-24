@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Usuarios</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>	
					<a href="{{ url('/') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Usuarios</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
@endsection

@section('content')
	@if(Auth::user()->type == "Administrador")
	<div class="row">
		<div class="col-md-3 col-md-offset-9" style="text-align: center; padding-bottom: 10px;">
			<a class="btn btn-info" href="{{ url('users/create') }}">
				<i class="fa fa-plus" aria-hidden="true"></i>
				&nbsp; Agrergar usuario
			</a>
		</div>
	</div>
	@endif

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Lista de usuarios</h2>

		</header>
		<div class="panel-body">
			<table class="table table-hover table-striped">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Tipo</th>
					<th>Créditos</th>
					<th>Etatus</th>
					<th>Acciones</th>
				</thead>
				@foreach($users as $user)
				
				<tr data-id={{ $user->id }}>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->lastname }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->type }}</td>
					<td>{{ $user->credits }}</td>
					<td>{{ ($user->status == 1 ? "Activo" : "Inactivo") }}</td>
					<td>
						{{ link_to_route('users.edit', 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-primary']) }}
						{{ Html::link('#', 'Eliminar', ['class' => 'btn btn-danger btn-delete']) }}
					</td>
				</tr>

				@endforeach
			</table>
			{!! $users->render() !!}
		</div>
	</section>
{!! Form::open(['route' => ['users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{

		$('.btn-delete').click(function(event)
		{
			event.preventDefault();
			event.stopPropagation();

			if(!confirm('¿Esta seguro que desea eliminar al usuario?'))
				return;

			var row 	= $(this).parents('tr');
			var id 		= row.data('id');
			var form 	= $('#form-delete');

			var url 	= form.attr('action').replace(':USER_ID', id); 
			var data 	= form.serialize();

			row.fadeOut();

			$.post(url, data, function(response)
			{
				alert(response);
			});
		});

		$('.table tr').click(function()
		{
			var id = $(this).data('id');
			window.location.href = "users/" + id;
		});
	});
</script>
@endsection