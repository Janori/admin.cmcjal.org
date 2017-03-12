@extends('layouts.main')

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
    @if(Auth::user()->type == 1)
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>

                </div>

                    <h2 class="panel-title"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir Archivo</h2>

            </header>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('files.upload')}} " >
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input required class="" type="file" name="file">
                    <button class="btn btn-primary btn-lg pull-right" type="submit">Subir</button>
                </form>
            </div>
        </section>

    @endif
    <section class="panel panel-default">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <h2 class="panel-title"><li class="fa fa-file" aria-hidden="true"></li>&nbsp;Lista de archivos</h2>

        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover mb-none">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
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
                                    <a href="{{ route('files.download', ['filename' => $files[$i]['name']]) }}">{{ $files[$i]['name'] }}</a>
                                </td>
                                <td class="actions-hover actions-fade">
                                    <a href="{{ route('files.download', ['filename' => $files[$i]['name']]) }}"><button class="btn btn-sm btn-default"><i class="fa fa-download"></i></button></a>
                                    @if($files[$i]['extension'] == 'txt' || $files[$i]['extension'] == 'gif' || $files[$i]['extension'] == 'jpg' ||$files[$i]['extension'] == 'jpeg' || $files[$i]['extension'] == 'png')
                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim preview" href="#" data-file="{{ asset('cmcjal/public/files/' . $files[$i]["name"])  }}" data-extension="{{ $files[$i]['extension'] }}">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @elseif($files[$i]['extension'] == 'pdf')
                                        <a  target="_blank" href="{{ asset("/cmcjal/public/files/". $files[$i]['name']) }}">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @endif
                                    @if(Auth::user()->type == 1)
                                        <a onclick="return confirm('Estas seguro?')" href="{{ route('files.delete', ['filename' => $files[$i]['name']]) }}"><button class="btn btn-sm btn-default"><i class="fa fa-trash-o i-delete-file"></i></button></a>
                                    @endif
                                </td>
                                <td>
                                    {{  ($files[$i]['size']) }}
                                </td>

                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal for see the images -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">              
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <p class="text-preview">
            </p>
            <img src="" class="image-preview img-responsive" style="width: 100%;max-height: 500px;" >
          </div>
        </div>
      </div>
    </div>
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
    {{-- <script src="/assets/javascripts/ui-elements/examples.modals.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.preview').click(function(event)
        {
            event.preventDefault();

            crsfToken = document.getElementsByName("_token")[0].value;

            var data = {
                src : $(this).data('file')
            }

            var filename = data.src.split('/');

            data.filename = filename[filename.length - 1];

            $('.text-preview').hide();
            $('.text-preview').html('');
            $('.image-preview').hide();

            if($(this).data('extension') == "txt")
            {            
                $.ajax({
                    url: '{{ route('files.preview') }}',
                    type: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    data: data,
                })
                .done(function(response) {
                    $('.text-preview').show();
                    $('.text-preview').append($('<p>' , {
                        'class' : 'title-preview',
                        'html'  : data.filename
                    }));

                    $('<p class="content-preview">' + response.content + '</p>').appendTo('.text-preview');
                    $('#modal').modal('show'); 

                })
            }
            else
            {
                $('.image-preview').show();
                $('.image-preview').attr('src', data.src);
                $('#modal').modal('show'); 
            }
            
        });
    });
</script>
@endsection