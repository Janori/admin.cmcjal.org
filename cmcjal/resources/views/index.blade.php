@extends('layouts.main')

@section('title')
    CMCJAL Admin
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Welcome</div>

        <div class="panel-body">
            Your Application's Landing Page.
        </div>
    </div>
@endsection

@section('pageHeader')
<header class="page-header">
    <h2>Panel de Control</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Panel de Control</span></li>
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