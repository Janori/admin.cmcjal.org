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
                        <a href="#files" data-toggle="tab" aria-expanded="false">Archivos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                    @if ($id == Auth::user()->id)
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
                    @else
                        <div id="edit" class="tab-pane">
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
                    @endif
                    </div>
                    <div id="files" class="tab-pane">


                        <h4 class="mb-xlg">Archivos subidos</h4>


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
            <a href="#" class="credits-user">{{ $user->credits }}</a>
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