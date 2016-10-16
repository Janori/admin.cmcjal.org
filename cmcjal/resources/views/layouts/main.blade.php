<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>@yield('title')</title>

        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        {!! Html::style(asset('assets/vendor/bootstrap/css/bootstrap.css')) !!}
        {!! Html::style(asset('assets/vendor/font-awesome/css/font-awesome.css')) !!}
        {!! Html::style(asset('assets/vendor/magnific-popup/magnific-popup.css')) !!}
        {!! Html::style(asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')) !!}

        <!-- Specific Page Vendor CSS -->
        {!! Html::style(asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')) !!}
        {!! Html::style(asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')) !!}
        {!! Html::style(asset('assets/vendor/morris/morris.css')) !!}

        <!-- Theme CSS -->
        {!! Html::style(asset('assets/stylesheets/theme.css')) !!}

        <!-- Skin CSS -->
        {!! Html::style(asset('assets/stylesheets/skins/default.css')) !!}

        <!-- Theme Custom CSS -->
        {!! Html::style(asset('assets/stylesheets/theme-custom.css')) !!}

        <!-- Head Libs -->
        {!! Html::script(asset('assets/vendor/modernizr/modernizr.js')) !!}

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" height="35" alt="Porto Admin" />
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            

            
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="{{ asset('cmcjal/storage/pictures/profile/'. (Auth::user()->image ? Auth::user()->image : 'default.png')) }}" alt="{{ Auth::user()->name }}" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="{{Auth::user()->name}}" data-lock-email="{{Auth::user()->email}}">
                                <span class="name">{{Auth::user()->name}}</span>
                                <span class="role">{{Auth::user()->type}}</span>
                            </div>
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('user').'/'.Auth::user()->id }}"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navegación
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <li class="nav-active">
                                        <a href="{{ url('/') }}">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Panel de Control</span>
                                        </a>
                                            <a href="{{ url('/events') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Calendario</a>
                                            <a href="{{ url('/files') }}"><i class="fa fa-folder-open" aria-hidden="true"></i> Articulos Destacados</a>

                                            <a href="{{ url('/gallery') }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Galeria</a>                                    </li>
                                </ul>
                            </nav>
                        </div> 
                
                    </div>
                
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    @yield('pageHeader')

                    <!-- start: page -->
                    @yield('content')
                    <!--<div class="row">
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <section class="panel">
                                <div class="panel-body">
                                    
                                </div>
                            </section>
                        </div>
                    </div>-->
                    <!-- end: page -->
                </section>
            </div>

            <aside id="sidebar-right" class="sidebar-right">
                <div class="nano">
                    <div class="nano-content">
                        <a href="#" class="mobile-close visible-xs">
                            Collapse <i class="fa fa-chevron-right"></i>
                        </a>
            
                        <div class="sidebar-right-wrapper">
            
                            <div class="sidebar-widget widget-calendar">
                                <h6>Calendario de eventos</h6>
                                <hr>
                                <!--<div data-plugin-datepicker data-plugin-skin="dark" ></div>-->
                                <div class="fc-mini">
                                    {!! $calendar->calendar() !!}
                                </div>
                                <a href="{{ url('/events') }}"><button class="btn btn-xs btn-default btn-block"> Ver calendario completo </button></a>
                                <hr>
                                <ul>
                                    <li>
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
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </section>

        <!-- Vendor -->
        {!! Html::script(asset('assets/vendor/jquery/jquery.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')) !!}
        {!! Html::script(asset('assets/vendor/bootstrap/js/bootstrap.js')) !!}
        {!! Html::script(asset('assets/vendor/nanoscroller/nanoscroller.js')) !!}
        {!! Html::script(asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')) !!}
        {!! Html::script(asset('assets/vendor/magnific-popup/magnific-popup.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')) !!}
        
        <!-- Specific Page Vendor -->
        {!! Html::script(asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-appear/jquery.appear.js')) !!}
        {!! Html::script(asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')) !!}
        {!! Html::script(asset('assets/vendor/flot/jquery.flot.js')) !!}
        {!! Html::script(asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js')) !!}
        {!! Html::script(asset('assets/vendor/flot/jquery.flot.pie.js')) !!}
        {!! Html::script(asset('assets/vendor/flot/jquery.flot.categories.js')) !!}
        {!! Html::script(asset('assets/vendor/flot/jquery.flot.resize.js')) !!}
        {!! Html::script(asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')) !!}
        {!! Html::script(asset('assets/vendor/raphael/raphael.js')) !!}
        {!! Html::script(asset('assets/vendor/morris/morris.js')) !!}
        {!! Html::script(asset('assets/vendor/gauge/gauge.js')) !!}
        {!! Html::script(asset('assets/vendor/snap-svg/snap.svg.js')) !!}
        {!! Html::script(asset('assets/vendor/liquid-meter/liquid.meter.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/jquery.vmap.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')) !!}
        {!! Html::script(asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')) !!}
        
        {!! Html::script(asset('assets/vendor/pnotify/pnotify.custom.js')) !!}
        <!-- Theme Base, Components and Settings -->
        {!! Html::script(asset('assets/javascripts/theme.js')) !!}
        
        <!-- Theme Custom -->
        {!! Html::script(asset('assets/javascripts/theme.custom.js')) !!}
        
        <!-- Theme Initialization Files -->
        {!! Html::script(asset('assets/javascripts/theme.init.js')) !!}


        <!-- Examples -->
        {!! Html::script(asset('assets/javascripts/dashboard/examples.dashboard.js')) !!} 

        {!! Html::script(asset('assets/javascripts/moment.min.js')) !!}
        {!! Html::script(asset('assets/javascripts/fullcalendar.min.js')) !!}
        {!! Html::script(asset('assets/javascripts/lang-all.js')) !!}
        {!! Html::style(asset('assets/stylesheets/fullcalendar.min.css')) !!}

        @yield('scripts')

        <script type="text/javascript">

        $(document).ready(function()
        {
            $('a.sidebar-right-toggle').css({
                'opacity' : 0,
                'visibility' : 'hidden' });
        });
        
        </script>
        {!! $calendar->script() !!}
        <style>
            div.fc-mini #calendar {
                width: 200px;
                margin: 0 auto;
                font-size: 10px;
            }
            div.fc-mini .fc-toolbar {
                font-size: .9em;
            }
            div.fc-mini .fc-toolbar h2 {
                font-size: 12px;
                white-space: normal !important;
            }
            /* click +2 more for popup */
            div.fc-mini .fc-more-cell a {
                display: block;
                width: 85%;
                margin: 1px auto 0 auto;
                border-radius: 3px;
                background: grey;
                color: transparent;
                overflow: hidden;
                height: 4px;
            }
            div.fc-mini .fc-more-popover {
                width: 100px;
            }
            div.fc-mini .fc-view-month .fc-event, div.fc-mini .fc-view-agendaWeek .fc-event, div.fc-mini .fc-content {
                font-size: 0;
                overflow: hidden;
                height: 1px;
            }
            div.fc-mini .fc-view-agendaWeek .fc-event-vert {
                font-size: 0;
                overflow: hidden;
                width: 2px !important;
            }
            div.fc-mini .fc-agenda-axis {
                width: 20px !important;
                font-size: .7em;
            }

            div.fc-mini .fc-button-content {
                padding: 0;
            }
            div.fc-mini table {
                border-collapse: collapse;
                border: none;
            }
            div.fc-mini td {
                padding: 0;
                border: none;
                text-align: center!important;
            }
            div.fc-mini .fc-day-grid-container.fc-scroller {
                height: 100%!important;
                overflow-y: hidden;
            }
            div.fc-mini .fc-basic-view .fc-body .fc-row {
                min-height: 34px;
            }
            div.fc-mini .fc-unthemed .fc-today {
                background: #FFFFFF;
                border: 0;
                color: #171717;
                font-weight: bold;
            }
            div.fc-mini .fc .fc-widget-header {
                background: #171717;
                color: white;
                border: 0;
            }
            div.fc-mini .fc-toolbar {
                text-align: center;
                margin-bottom: 0;
                font-size: .6em;
            }

            div.fc-mini .fc .fc-toolbar>*>* {
                float: left;
                margin-left: .75em;
            }
            div.fc-mini .fc-state-default.fc-corner-right {
                border-top-right-radius: 2px;
                border-bottom-right-radius: 2px;
            }
            div.fc-mini .fc-state-default.fc-corner-left {
                border-top-left-radius: 2px;
                border-bottom-left-radius: 2px;
            }
            div.fc-mini .fc-right {
                display: none;
            }
            div.fc-mini .fc-row.fc-week.fc-widget-content.fc-rigid {
                border-top: 1px solid black;
            }
            .sidebar-widget.widget-calendar ul {
                border:none;
                padding:0px;
            }
        </style>
    </body>
</html>