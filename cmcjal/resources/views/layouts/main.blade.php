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
        {!! Html::style(asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.12.0.css')) !!}
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

        <!-- AdminLTE Skins -->
        {{!! Html::style(asset('assets/vendor/admin-lte/AdminLTE.min.css')) !!}
        {{!! Html::style(asset('assets/stylesheets/custom.css')) !!}

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
                                <img src="{{ asset('cmcjal/storage/pictures/profile/'. (Auth::user()->image ? Auth::user()->image : 'default.png')) }}" alt="{{ Auth::user()->name }}" class="img-circle" data-lock-picture="{{ asset('cmcjal/storage/pictures/profile/'. (Auth::user()->image ? Auth::user()->image : 'default.png')) }}" />
                            </figure>
                            <div class="profile-info" data-lock-name="{{Auth::user()->name}}" data-lock-lastname="{{ Auth::user()->lastname }}" data-lock-email="{{Auth::user()->email}}" data-lock-token={{ csrf_token() }} >
                                <span class="name">{{Auth::user()->name}}</span>
                                <span class="role">{{Auth::user()->type}}</span>
                            </div>
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('users').'/'.Auth::user()->id }}"><i class="fa fa-user"></i> Mi Perfil</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Bloquear Pantalla</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
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
                                            @if(Auth::user()->type == "Administrador")
                                            
                                            <a href="{{ url('/users') }}"><i class="fa fa-user-md" aria-hidden="true"></i> <span>Usuarios</span></a>
                                            <a href="{{ url('/assistance') }}"><i class="fa fa-check-square" aria-hidden="true"></i> <span>Asistencia</span></a>
                                            
                                            @endif
                                            <a href="{{ url('/events') }}"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Calendario</span></a>
                                            <a href="{{ url('/files') }}"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>Articulos</span> Destacados</a>

                                            <a href="{{ url('/gallery') }}"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Galeria</span></a>                                    </li>
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
                                </div>
                                <a href="{{ url('/events') }}"><button class="btn btn-xs btn-default btn-block"> Ver calendario completo </button></a>
                                <hr>                                
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
        {!! Html::script(asset('assets/vendor/jquery-ui/js/jquery-ui-1.12.0.js')) !!}
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
        {{--{!! Html::script(asset('assets/javascripts/dashboard/examples.dashboard.js')) !!} --}}


        <!-- Full Calendar -->
        {!! Html::script(asset('assets/javascripts/moment.min.js')) !!}
        {!! Html::style(asset('assets/javascripts/fullcalendar/fullcalendar.min.css')) !!}
        {!! Html::script(asset('assets/javascripts/fullcalendar/fullcalendar.min.js')) !!}
        {!! Html::script(asset('assets/javascripts/fullcalendar/locale/es.js')) !!}
        
        @yield('scripts')

        <script type="text/javascript">

        $(document).ready(function()
        {
            $('a.sidebar-right-toggle').css({
                'opacity' : 0,
                'visibility' : 'hidden' });
            @if (session('locked', false))
                LockScreen.show();
            @endif
        });

        
        </script>
    </body>
</html>