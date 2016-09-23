@extends('layouts.main')

@section('title')
    CMCJAL Admin
@endsection

@section('content')
  <header class="page-header">
        <h2>Calendario</h2>
    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Calendario</span></li>
            </ol>
    
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    {!! $calendar2->calendar() !!}
                </div>
                <div class="col-md-3">
                    <p class="h4 text-light">Eventos del Mes</p>

                    <hr />

                    <div id='external-events'>
                        <span class="label label-default">Caducada</span>
                        <span class="label label-success">Vigente</span>
                        <span class="label label-warning">Pendiente</span>
                        <span class="label label-danger">Cancelada</span>
                        <span class="label label-primary">Reagendar</span>
                    </div>
                    <div>
                        @foreach ($events as $event)
                            @if($event->status == "aceptada")
                                <div class="event-bg bg-success">
                                    <time datetime="2014-04-19T00:00+00:00">{{ $event->start }}</time>
                                    <span>{{ $event->title }}</span>
                                </div>
                            @elseif($event->status == "cancelada")
                                <div class="event-bg bg-danger">
                                    <time datetime="2014-04-19T00:00+00:00">{{ $event->start }}</time>
                                    <span>{{ $event->title }}</span>
                                </div>
                            @elseif($event->status == "pendiente")
                                <div class="event-bg bg-warning">
                                    <time datetime="2014-04-19T00:00+00:00">{{ $event->start }}</time>
                                    <span>{{ $event->title }}</span>
                                </div>
                            @elseif($event->status == "reagendar")
                                <div class="event-bg bg-primary">
                                    <time datetime="2014-04-19T00:00+00:00">{{ $event->start }}</time>
                                    <span>{{ $event->title }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
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