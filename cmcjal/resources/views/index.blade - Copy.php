@extends('layouts.main')

@section('title')
    CMCJAL Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">

            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        <img src="/assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{ $user->name }}</span>
                            <span class="thumb-info-type">{{ $user->type  }}</span>
                        </div>
                    </div>

                    <hr class="dotted short">

                    <h6 class="text-muted">Informacion</h6>
                        
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
                        <a href="#edit" data-toggle="tab" aria-expanded="false">Edit</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">


                        <h4 class="mb-xlg">Eventos</h4>

                        <div class="timeline timeline-simple mt-xlg mb-md">
                            <div class="tm-body">
                                <ol class="tm-items">
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-none">7 months ago.</p>
                                            <p>
                                                It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-none">7 months ago.</p>
                                            <p>
                                                What is your biggest developer pain point?
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-none">7 months ago.</p>
                                            <p>
                                                Checkout! How cool is that!
                                            </p>
                                            <div class="thumbnail-gallery">
                                                <a class="img-thumbnail lightbox" href="/assets/images/projects/project-4.jpg" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                                                    <img class="img-responsive" width="215" src="/assets/images/projects/project-4.jpg">
                                                    <span class="zoom">
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div id="edit" class="tab-pane">

                        <form class="form-horizontal" method="get">
                            <h4 class="mb-xlg">Personal Information</h4>
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

@section('menu')
<nav id="menu" class="nav-main" role="navigation">
    <ul class="nav nav-main">
        <li class="nav-active">
            <a href="/">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Panel de Control</span>
            </a>
        </li>
        <li>
            <a href="mailbox-folder.html">
                <span class="pull-right label label-primary">182</span>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Mailbox</span>
            </a>
        </li>
        <li class="nav-parent">
            <a>
                <i class="fa fa-align-left" aria-hidden="true"></i>
                <span>Menu Levels</span>
            </a>
            <ul class="nav nav-children">
                <li>
                    <a>First Level</a>
                </li>
                <li class="nav-parent">
                    <a>Second Level</a>
                    <ul class="nav nav-children">
                        <li class="nav-parent">
                            <a>Third Level</a>
                            <ul class="nav nav-children">
                                <li>
                                    <a>Third Level Link #1</a>
                                </li>
                                <li>
                                    <a>Third Level Link #2</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>Second Level Link #1</a>
                        </li>
                        <li>
                            <a>Second Level Link #2</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <hr class="separator" />

        <div class="sidebar-widget widget-tasks">
            <div class="widget-header">
                <h6>Projects</h6>
                <div class="widget-toggle">+</div>
            </div>
            <div class="widget-content">
                <ul class="list-unstyled m-none">
                    <li><a href="#">Porto HTML5 Template</a></li>
                    <li><a href="#">Tucson Template</a></li>
                    <li><a href="#">Porto Admin</a></li>
                </ul>
            </div>
        </div>

        <hr class="separator" />

        <div class="sidebar-widget widget-stats">
            <div class="widget-header">
                <h6>Company Stats</h6>
                <div class="widget-toggle">+</div>
            </div>
            <div class="widget-content">
                <ul>
                    <li>
                        <span class="stats-title">Stat 1</span>
                        <span class="stats-complete">85%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">85% Complete</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="stats-title">Stat 2</span>
                        <span class="stats-complete">70%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                <span class="sr-only">70% Complete</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="stats-title">Stat 3</span>
                        <span class="stats-complete">2%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                <span class="sr-only">2% Complete</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </ul>
</nav>
@endsection