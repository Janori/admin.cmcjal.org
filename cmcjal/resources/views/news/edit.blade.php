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
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;Editar noticia</h2>

		</header>
		<div class="panel-body">
            <h1>Editar noticia</h1>
            <hr>
                {{ Form::model($news, array('route' => array('news.update', $news->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="form-group">
					{{ Form::label('image', 'Imagen principal') }}
					{{ Form::file('image', array('class' => 'form-control')) }}<br>

					{{ Form::label('title', 'Titulo') }}
					{{ Form::text('title', null, array('class' => 'form-control')) }}<br>

					{{ Form::label('title', 'Categoría') }}
					{{ Form::select('category', [
						'INTERNACIONALES' => 'INTERNACIONALES',
						'NACIONALES'	  => 'NACIONALES',
						'LOCALES' 		  => 'LOCALES',
						'SESIONES MENSUALES' => 'SESIONES MENSUALES',
						'NOTICIAS'			=> 'NOTICIAS'
					], null, array('class' => 'form-control')) }}<br>

					{{ Form::label('body', 'Cuerpo de la noticia') }}
					{{ Form::textarea('body', null, array('class' => 'form-control', 'id' => 'body-field')) }}<br>
					@ckeditor('body-field')

					{{ Form::label('link', 'Link') }}
					{{ Form::text('link', null, array('class' => 'form-control')) }}<br>

					{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
        	</div>
	</section>
{{-- {!! Form::open(['route' => ['users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!} --}}
@endsection


@section('scripts')
@endsection
