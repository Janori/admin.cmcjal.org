@extends('layouts.main')

@section('content')
	@if (count($errors) > 0)
	  <div class="custom-alert-padding">
		<div class="flash-message">
		  <div class="alert alert-danger">
			  <ul>
				  @foreach ($errors->all() as $error)
					  <li>{{ $error }}</li>
				  @endforeach
			  </ul>
		  </div>
		<div class="flash-message">
	  </div>
	@endif
	<div class="custom-alert-padding">
		<div class="flash-message">
			@foreach (['danger', 'warning', 'success', 'info',] as $msg)
			  @if(Session::has('alert-' . $msg))
			  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			  @endif
			@endforeach
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-3">

			<section class="panel">
				<div class="panel-body">
					<div class="thumb-info mb-md">
						<div class="preview-area">
							<center>
								<img src="{{ asset('/cmcjal/storage/pictures/profile/'. ($user->image ?$user->image : 'default.png')) }}" class="img-profile rounded" alt="{{ $user->name }}">
							</center>
						</div>
						{{-- <div class="thumb-info-title">
							<span class="thumb-info-inner small"><small>{{ $user->name . ' ' . $user->lastname }}</small></span>

						</div> --}}
					</div>
					@if ($id == Auth::user()->id)
						<form method="POST" action="{{ route('users.picture', ['id' => $user->id]) }}" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<div class="">
									<a href="#" class="btn btn-lg btn-default no-radius-bottom" style="width: 100%;" onclick="clickOriginalForm(); return false;">Cambiar Imagen</a>
									<input id="image-input" class="form-control no-radius-bottom hidden" type="file" name="picture" required>
								</div>
								<button type="submit" class="btn btn-lg btn-block btn-primary no-radius-top">Subir Imagen</button>
							</div>
						</form>
					@endif
					<hr class="dotted short">

					<h6 class="text-muted">Información</h6>
						<span class="thumb-info-type">{{ $user->type == 1 ? 'Administrador': 'Colegiado' }}</span>
						<br>
						<span class="thumb-info-type">{{ $user->title  }}</span>
						<br>
						<small>Miembro desde {{substr($user->created_at, 0, 10) }}</small>
					<hr class="dotted short">

				   <!--<div class="social-icons-list">
						<a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
						<a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
						<a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
					</div>-->

				</div>
			</section>
		</div>
		<div class="col-md-8 col-lg-6">

			<div class="tabs">
				<ul class="nav nav-tabs tabs-primary">
					<li class="active">
						<a href="#overview" data-toggle="tab" aria-expanded="true">Informacion</a>
					</li>
					@if(Auth::user()->type == config('constants.USER_TYPE.Administrador'))
					<li>
						<a href="#files" data-toggle="tab" aria-expanded="false">Archivos</a>
					</li>
					@endif
				</ul>
				<div class="tab-content">
					<div id="overview" class="tab-pane active">
						<div id="edit" class="tab-pane">
							@if(Auth::user()->type == config('constants.USER_TYPE.Administrador'))
								<a class="btn btn-info" href="javascript:void(0);" onclick="bootbox.alert('No tiene permisos para editar')" style="float: right;">
									<i class="fa fa-pencil" aria-hidden="true"></i>
									&nbsp; Editar información
								</a>
							@endif
							<h4 class="mb-xlg">Informacion del usuario</h4>
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileFirstName">Nombre</label>
									<label class="col-md-8" for="profileFirstName">{{ $user->name }}</label>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="profileLastName">Apellidos</label>
									<label class="col-md-8" for="profileLastName">{{ $user->lastname }}</label>
								</div>
							</fieldset>
							<hr class="dotted tall">
						</div>
					</div>
					<div id="files" class="tab-pane">
						@if(Auth::user()->type == config('constants.USER_TYPE.Administrador'))
							<a class="btn btn-info" href="javascript:void(0);" onclick="bootbox.alert('No tiene permisos para editar')" style="float: right;">
								<i class="fa fa-pencil" aria-hidden="true"></i>
								&nbsp; Editar Archivos
							</a>
						@endif
						<h4 class="mb-xlg">Archivos subidos</h4>
							@foreach($required as $type => $name)
								<div class="form-group">
								@if(isset($documentation->{$type}))

									<label class="col-md-3 control-label">{{ $required[$type] }}</label>
									<label class="col-md-8">
										<a href="{{ route('users.get_doc', ['id' => $id, 'file' => $type]) }}" target="_blank" class="file_link">
										{{ $documentation->{$type} }}
										</a>
									</label>
								@else
									<label class="col-md-3 control-label">{{ $required[$type] }}</label>
									<label class="col-md-8"><span class="file_link">No disponible</span>
								@endif
								</div>
							@endforeach

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-3">

			<h4 class="mb-md">Status</h4>
			<ul class="simple-card-list" style="width: 50%;">
				@if ($user->status == "1")
					<li class="success" style="text-align: center;"> Activo </li>
				@else
					<li class="danger" style="text-align: center;"> Inactivo </li>
				@endif

			</ul>

			<h4 style=""> Creditos obtenidos: </h4>
			@if($credits > 0)
				<a href="#" class="credits-user">{{ $credits }}</a>
			@else
				<span class="credits-user">{{ $credits }}</span>
			@endif
	</div>
	<!-- Modal -->
	<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Créditos obtenidos</h4>
				</div>
				<div class="modal-body assistance-container">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<th>Fecha</th>
								<th>Evento</th>
								<th>Créditos otorgados</th>
								<th>Diploma</th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>

		</div>
	</div>
@endsection

@section('pageHeader')
<header class="page-header">
	<h2>Perfil de Usuario</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ route('admin.index') }}">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Perfil de Usuario</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{
		$('a.credits-user').click(function()
		{
			var url 	= '{{ route('users.assistance', ['id' => $user->id]) }}';
			var data 	= {'_token' : '{{ csrf_token() }}'};
			$.post(url, data, function(response)
			{
				var container = $('.assistance-container tbody');
					container.empty();

				for(var i = 0; i < response.length; i++)
				{
					var url = "{{ url('admin/diploma', ['USER_ID', 'EVENT_ID'])}}";
					url = url.replace('USER_ID', response[i].user_id).replace('EVENT_ID', response[i].event_id);
					$('<tr>').append('<td>' + response[i].date + '</td>')
							 .append('<td>' + response[i].title + '</td>')
							 .append('<td>' + response[i].credits + '</td>')
							 .append('<td><a href="' + url + '" target="_blank" class="btn btn-info certificate"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Ver certificado </a></td>' )
							 .appendTo(container);
				}
			});

			$('#modal').modal();
		});
	});

	function generateCertificate() {
		//https://tcpdf.org/examples/example_051/
	}
</script>
<script>
if($('#image-input').length)
{
  var inputLocalFont = document.getElementById("image-input");
  inputLocalFont.addEventListener("change",previewImages,false);
  function previewImages(){
	  var fileList = this.files;
	  var anyWindow = window.URL || window.webkitURL;
		  $( ".preview-area" ).empty();
		  for(var i = 0; i < fileList.length; i++){
			var objectUrl = anyWindow.createObjectURL(fileList[i]);
			$('.preview-area').append('<img class="img-profile img-preview rounded img-responsive" src="' + objectUrl + '" />');
			window.URL.revokeObjectURL(fileList[i]);
		  }
  }


  function clickOriginalForm()
  {
	$('#image-input').click();
  };
}
</script>
@endsection
