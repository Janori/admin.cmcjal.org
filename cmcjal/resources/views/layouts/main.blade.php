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
        <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
        <link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
        <link rel="stylesheet" href="/assets/vendor/morris/morris.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="/assets/vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../" class="logo">
                        <img src="/assets/images/logo.png" height="35" alt="Porto Admin" />
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                    <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
            
                    <span class="separator"></span>
            
                    <ul class="notifications">
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="badge">3</span>
                            </a>
            
                            <div class="dropdown-menu notification-menu large">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">3</span>
                                    Tasks
                                </div>
            
                                <div class="content">
                                    <ul>
                                        <li>
                                            <p class="clearfix mb-xs">
                                                <span class="message pull-left">Generating Sales Report</span>
                                                <span class="message pull-right text-dark">60%</span>
                                            </p>
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </li>
            
                                        <li>
                                            <p class="clearfix mb-xs">
                                                <span class="message pull-left">Importing Contacts</span>
                                                <span class="message pull-right text-dark">98%</span>
                                            </p>
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                            </div>
                                        </li>
            
                                        <li>
                                            <p class="clearfix mb-xs">
                                                <span class="message pull-left">Uploading something big</span>
                                                <span class="message pull-right text-dark">33%</span>
                                            </p>
                                            <div class="progress progress-xs light mb-xs">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="badge">4</span>
                            </a>
            
                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">230</span>
                                    Messages
                                </div>
            
                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Doe</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="/assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joe Junior</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
                                            </a>
                                        </li>
                                    </ul>
            
                                    <hr />
            
                                    <div class="text-right">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="badge">3</span>
                            </a>
            
                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">3</span>
                                    Alerts
                                </div>
            
                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-thumbs-down bg-danger"></i>
                                                </div>
                                                <span class="title">Server is Down!</span>
                                                <span class="message">Just now</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-lock bg-warning"></i>
                                                </div>
                                                <span class="title">User Locked</span>
                                                <span class="message">15 minutes ago</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-signal bg-success"></i>
                                                </div>
                                                <span class="title">Connection Restaured</span>
                                                <span class="message">10/10/2014</span>
                                            </a>
                                        </li>
                                    </ul>
            
                                    <hr />
            
                                    <div class="text-right">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
            
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="{{ '/cmcjal/storage/pictures/profile/'.Auth::user()->image}}" alt="{{ Auth::user()->name }}" class="img-circle" data-lock-picture="/assets/images/!logged-user.jpg" />
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
                            Navigation
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
        <script src="/assets/vendor/jquery/jquery.js"></script>
        <script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        
        <!-- Specific Page Vendor -->
        <script src="/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="/assets/vendor/jquery-appear/jquery.appear.js"></script>
        <script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="/assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.js"></script>
        <script src="/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.pie.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.categories.js"></script>
        <script src="/assets/vendor/flot/jquery.flot.resize.js"></script>
        <script src="/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="/assets/vendor/raphael/raphael.js"></script>
        <script src="/assets/vendor/morris/morris.js"></script>
        <script src="/assets/vendor/gauge/gauge.js"></script>
        <script src="/assets/vendor/snap-svg/snap.svg.js"></script>
        <script src="/assets/vendor/liquid-meter/liquid.meter.js"></script>
        <script src="/assets/vendor/jqvmap/jquery.vmap.js"></script>
        <script src="/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
        <script src="/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
        <script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
        
        <script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="/assets/javascripts/theme.js"></script>
        
        <!-- Theme Custom -->
        <script src="/assets/javascripts/theme.custom.js"></script>
        
        <!-- Theme Initialization Files -->
        <script src="/assets/javascripts/theme.init.js"></script>


        <!-- Examples -->
        <script src="/assets/javascripts/dashboard/examples.dashboard.js"></script>

        <script src="/assets/javascripts/moment.min.js"></script>
        <script src="/assets/javascripts/fullcalendar.min.js"></script>
        <script src="/assets/javascripts/lang-all.js"></script>
        <link rel="stylesheet" href="/assets/stylesheets/fullcalendar.min.css"/>
        @yield('scripts')
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