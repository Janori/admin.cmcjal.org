@extends('layouts.main')

<!-- Main content -->
@section('content')
	<div class="custom-alert-padding">

	</div>
	@if(Auth::user()->type == 1)
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>

				</div>

					<h2 class="panel-title"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir Imagen</h2>

			</header>
			<div class="panel-body">
				{!! Form::open(['route' => 'thumbnail.store', 'method' => 'POST', 'files' => 'true']) !!}
					<input required class="" type="file" name="image">
					<button class="btn btn-primary btn-lg pull-right" type="submit">Subir</button>
				{!! Form::close() !!}
			</div>
		</section>

		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>

				</div>

					<h2 class="panel-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Lista de imágenes</h2>

			</header>
			<div class="panel-body">
				<table class="table table-hover table-striped">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</thead>
				@foreach($thumbnails as $thumbnail)
				
				<tr data-id={{ $thumbnail->id }}>
					<td>{{ $thumbnail->id }}</td>
					<td>{{ $thumbnail->name }}</td>
					<td>
						{{ Html::link('#', 'Eliminar', ['class' => 'btn btn-danger btn-delete']) }}
					</td>
				</tr>

				@endforeach
			</table>
				{!! Form::open(['route' => ['thumbnail.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
				{!! Form::close() !!}
			</div>
		</section>

	@endif
	<section class="panel panel-default">
		<header class="panel-heading">
			<div class="panel-actions">
			</div>

			<h2 class="panel-title"><li class="fa fa-image" aria-hidden="true"></li>&nbsp;Galería de imágenes</h2>

		</header>

		<div class="panel-body">
			<div class="row" data-lightbox="gallery">
				@foreach($thumbnails as $thumbnail)
				<div class="col-sm-6 col-md-4" data-id="{{ $thumbnail->id }}">
					<a class="thumb" data-lightbox="image" href="{{ asset('/cmcjal/public/thumbnails/' .$thumbnail->image) }}">
						<img src="{{ asset('/cmcjal/public/thumbnails/thumb_' .$thumbnail->image) }}" alt="{{ $thumbnail->name }}">
						<span class="thumb__overlay fa	fa-search-plus"></span>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	{!! Html::style(asset('assets/stylesheets/magic-popup.css')) !!}
@endsection


<!-- Page Header/Title -->
@section('pageHeader')
<header class="page-header">
	<h2>Archivos</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ url('/') }}">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Galería</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>
@endsection


<!--JS Scripts-->
@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{

		$('.btn-delete').click(function(event)
		{
			event.preventDefault();
			event.stopPropagation();

			if(!confirm('¿Esta seguro que desea eliminar esta imagen?'))
				return;

			var row 	= $(this).parents('tr');
			var id 		= row.data('id');
			var form 	= $('#form-delete');

			var url 	= form.attr('action').replace(':USER_ID', id); 
			var data 	= form.serialize();

			row.fadeOut();
			$('div[data-id="' + id + '"]').fadeOut();
			$('div[data-id="' + id + '"]').remove();

			$.post(url, data, function(response)
			{
				bootbox.alert(response);
			});
		});
	});
</script>
</script>

<script type="text/javascript" src="{{ asset('assets/javascripts/magic-popup.js') }}"></script>
<script type="text/javascript">
/**
 * @module       Magnific Popup
 * @description  Enables Magnific Popup Plugin
 */
;
(function ($) {

    var o = $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
        g = $('[data-lightbox^="gallery"]');

    if (o.length > 0 || g.length > 0) {

        $(document).ready(function () {
        	console.log(o.length, g.length);
            if (o.length) {
                o.each(function () {
                    var $this = $(this);
                    $this.magnificPopup({
                        type: $this.attr("data-lightbox")
                    });
                })
            }

            if (g.length) {
                g.each(function () {
                    var $gallery = $(this);
                    $gallery
                        .find('[data-lightbox]').each(function () {
                            var $item = $(this);
                            $item.addClass("mfp-" + $item.attr("data-lightbox"));
                        })
                        .end()
                        .magnificPopup({
                            delegate: '[data-lightbox]',
                            type: "image",
                            gallery: {
                                enabled: true
                            }
                        });
                })
            }
        });
    }
})(jQuery);
</script>
@endsection