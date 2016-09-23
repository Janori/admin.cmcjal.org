@extends('layouts.main')


<!-- Site title -->
@section('title')
    CMCJAL Admin
@endsection

<!-- Main content -->
@section('content')
    <div class="custom-alert-padding">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info', 'default', 'dark'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
            @endforeach
        </div>
    </div>
    @if(Auth::user()->type == "Administrador")
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>

                </div>

                    <h2 class="panel-title">Subir Archivo</h2>

            </header>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="POST" action="{{url('uploadfile')}}" >
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input required class="" type="file" name="file">
                    <button class="btn btn-dark pull-right" type="submit">Subir</button>
                </form>
            </div>
        </section>

    @endif
    <section class="panel panel-dark">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <h2 class="panel-title">Archivos</h2>

        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover mb-none">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($files); $i++)
                            <tr class="file-manager-row">
                                <td>
                                    @if($files[$i]['extension'] == "txt")
                                        <i class="fa fa-file-text-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "zip" || $files[$i]['extension'] == "rar")
                                        <i class="fa fa-file-archive-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "jpg" || $files[$i]['extension'] == 'jpeg' || $files[$i]['extension'] == "png" || $files[$i]['extension'] == "gif" || $files[$i]['extension'] == "psd")
                                        <i class="fa fa-file-image-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "pdf")
                                        <i class="fa fa-file-pdf-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "doc" || $files[$i]['extension'] == "docx")
                                        <i class="fa fa-file-word-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "xls" || $files[$i]['extension'] == "xlsx")
                                        <i class="fa fa-file-excel-o i-file-manager"></i>
                                    @elseif($files[$i]['extension'] == "ppt" || $files[$i]['extension'] == "pptx")
                                        <i class="fa fa-file-powerpoint-o i-file-manager"></i>
                                    @else 
                                       <i class="fa fa-file-o i-file-manager"></i>
                                    @endif
                                    <a href="{{ url('download/'.$files[$i]['name'])}}">{{$files[$i]['name']}}</a>
                                </td>
                                <td class="actions-hover actions-fade">
                                    <a href="{{ url('download/'.$files[$i]['name'])}}"><button class="btn btn-sm btn-default"><i class="fa fa-download"></i></button></a>
                                    @if($files[$i]['extension'] == 'txt' || $files[$i]['extension'] == 'gif' || $files[$i]['extension'] == 'jpg' ||$files[$i]['extension'] == 'jpeg' || $files[$i]['extension'] == 'png')
                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim" href="#modal{{$files[$i]['id']}}">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @elseif($files[$i]['extension'] == 'pdf')
                                        <a  target="_blank" href="/cmcjal/public/files/{{$files[$i]['name']}}">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @endif
                                    @if(Auth::user()->type == "Administrador")
                                        <a onclick="return confirm('Estas seguro?')" href="{{ url('deletefile/'.$files[$i]['name'])}}"><button class="btn btn-sm btn-default"><i class="fa fa-trash-o i-delete-file"></i></button></a>
                                    @endif
                                </td>
                                <td>
                                    {{  ($files[$i]['size']) }}
                                </td>

                            </tr>


                            @if($files[$i]['extension'] == 'txt' || $files[$i]['extension'] == 'gif' || $files[$i]['extension'] == 'jpg' ||$files[$i]['extension'] == 'jpeg' || $files[$i]['extension'] == 'png')



                                <div id="modal{{$files[$i]['id']}}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            <h2 class="panel-title">{{$files[$i]['name']}}</h2>
                                        </header>
                                        <div class="panel-body">
                                            <div class="modal-wrapper">

                                                <div class="modal-text">
                                                    @if($files[$i]['extension'] == 'txt')
                                                        <p>{{$files[$i]['content']}}</p>
                                                    @elseif($files[$i]['extension'] == 'gif' || $files[$i]['extension'] == 'jpg' ||$files[$i]['extension'] == 'jpeg' || $files[$i]['extension'] == 'png')
                                                        <img class="img-responsive file-manager-img-preview" src="/cmcjal/public/files/{{$files[$i]['name']}}">

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn-dark modal-confirm"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </footer>
                                    </section>
                                </div>
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
            <li><span>Archivos</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>
@endsection


<!--JS Scripts-->
@section('scripts')
    <script src="/assets/javascripts/ui-elements/examples.modals.js"></script>
    
    <!--AJAX-->
@endsection