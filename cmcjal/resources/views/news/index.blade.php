@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Noticias</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{ route('admin.index') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Noticias</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3 col-md-offset-9" style="text-align: center; padding-bottom: 10px;">
			<a class="btn btn-info" href="{{ route('news.create') }}">
				<i class="fa fa-plus" aria-hidden="true"></i>
				&nbsp; Agrergar noticia
			</a>
		</div>
	</div>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;Lista de noticias</h2>

		</header>
		<div class="panel-body">
			<table class="table table-hover table-striped">
				<thead>
					<th>ID</th>
					<th>Titulo</th>
					<th>Categoría</th>
					<th>Acciones</th>
				</thead>
				@foreach($news as $item)

				<tr data-id={{ $item->id }}>
					<td>{{ $item->id }}</td>
					<td>{{ $item->title }}</td>
					<td>{{ $item->category }}</td>
					<td>
						{{ link_to_route('news.edit', 'Editar', $parameters = $item->id, $attributes = ['class' => 'btn btn-primary']) }}
						{{ Html::link('#', 'Eliminar', ['class' => 'btn btn-danger btn-delete']) }}
					</td>
				</tr>

				@endforeach
			</table>
		</div>
	</section>
{!! Form::open(['route' => ['news.destroy', ':NEWS_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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

			var url 	= form.attr('action').replace(':NEWS_ID', id);
			var data 	= form.serialize();

			row.fadeOut();

			$.post(url, data, function(response)
			{
				bootbox.alert(response);
			});
		});
	});
</script>
@endsection
