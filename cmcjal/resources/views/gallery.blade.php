@extends('layouts.main')


<!-- Site title -->
@section('title')
    CMCJAL Admin
@endsection

<!-- Main content -->
@section('content')
    <div class="custom-alert-padding">

    </div>
    @if(Auth::user()->type == "Administrador")
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>

                </div>

                    <h2 class="panel-title">Galeria</h2>

            </header>
            <div class="panel-body">

            </div>
        </section>

    @endif

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