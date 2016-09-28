@extends('layouts.main')

@section('title')
    CMCJAL Admin
@endsection

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
                            <img src="{{ '/cmcjal/storage/pictures/profile/'.$user->image}}" class="img-profile rounded img-responsive" alt="John Doe">
                        </div>
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{ $user->name }}</span>
                            
                        </div>
                    </div>
                    @if ($user->id == Auth::user()->id)
                        <form method="POST" action="{{ url('uploadpicture/'.$user->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="">
                                    <input id="image-input" class="form-control no-radius-bottom" type="file" name="picture" required>
                                </div>
                                <button type="submit" class="btn btn-xs btn-block btn-primary no-radius-top">Cambiar Imagen</button>
                            </div>
                        </form>
                    @endif
                    <hr class="dotted short">

                    <h6 class="text-muted">Información</h6>
                        <span class="thumb-info-type">{{ $user->type  }}</span>
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
                    <li class="">
                        <a href="#edit" data-toggle="tab" aria-expanded="false">Editar</a>
                    </li>
                    <li class="">
                        <a href="#files" data-toggle="tab" aria-expanded="false">Archivos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">


                        <h4 class="mb-xlg">Eventos</h4>

                        <div class="timeline timeline-simple mt-xlg mb-md">
                            <div class="tm-body">
                                <ol class="tm-items">
                                    @foreach($events as $event)
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-none">{{ $event->start }}</p>
                                            <p>
                                                {{ $event->title }}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    @if ($user->id == Auth::user()->id)
                        <div id="edit" class="tab-pane">

                            <form class="form-horizontal" method="get">
                                <h4 class="mb-xlg">Editar Informacion</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">Nombre</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileFirstName" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileLastName">Apellidos</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileLastName" value="{{ $user->lastname }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-3">
                                            <button class="btn btn-primary form-control" type="submit">Cambiar</button>
                                        </div>
                                    </div>

                                </fieldset>
                                <hr class="dotted tall">
                                <h4 class="mb-xlg">Cambiar Contraseña</h4>
                                <fieldset class="mb-xl">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPassword">Nueva Contraseña</label>
                                        <div class="col-md-8">
                                            <input type="password" class="form-control" id="profileNewPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repita la Contraseña</label>
                                        <div class="col-md-8">
                                            <input type="password" class="form-control" id="profileNewPasswordRepeat">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cambiar</button>
                                            <button type="reset" class="btn btn-default">Limpiar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    @endif
                    <div id="files" class="tab-pane">


                        <h4 class="mb-xlg">aRCHIVOS</h4>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">

            <h4 class="mb-md">Status</h4>
            <ul class="simple-card-list mb-xlg">
                @if ($user->status == "Pagado")
                    <li class="success">
                        {{ $user->status }}
                    </li>
                @else
                    <li class="danger">
                        {{ $user->status }}
                    </li>
                @endif
                
            </ul>
    </div>
@endsection

@section('pageHeader')
<header class="page-header">
    <h2>Perfil de Usuario</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ url('/') }}">
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
<script>
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
</script>
@endsection