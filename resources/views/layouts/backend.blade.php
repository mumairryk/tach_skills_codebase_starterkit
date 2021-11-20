<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Zanella Dev</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
  <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
</head>

<body>
  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">


    <nav id="sidebar">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">

          <!-- Normal Mode -->
          <div class="content-header-section text-center align-parent sidebar-mini-hidden">


            <!-- Logo -->
            <div class="content-header-item">
              <a class="link-effect font-w700" href="/">
                <i class="si si-fire text-primary"></i>
                <span class="font-size-xl text-dual-primary-dark">Zanella</span><span class="font-size-xl text-primary">Dev</span>
              </a>
            </div>
            <!-- END Logo -->
          </div>
          <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side User -->
          <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
              <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
              <a class="img-link" href="javascript:void(0)">
                <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
              </a>
              <ul class="list-inline mt-10">
                <li class="list-inline-item">
                  <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="javascript:void(0)">{{Auth::user()->name}}</a>
                </li>
                <li class="list-inline-item">
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                    <i class="si si-drop"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                  >
                    <i class="si si-logout"></i>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Visible only in normal mode -->
          </div>
          <!-- END Side User -->

          <!-- Side Navigation -->
          <div class="content-side content-side-full">
            <ul class="nav-main">
              <li>
                <a class="{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                  <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                </a>
              </li>
              <li class="nav-main-heading">
                <span class="sidebar-mini-visible">VR</span><span class="sidebar-mini-hidden">Various</span>
              </li>
                <li class="{{request()->routeIs("users*") ? ' open' : '' }}">

                    <a  class="nav-submenu" data-toggle="nav-submenu" href="#">
                        <i class="si si-user"></i><span class="sidebar-mini-hide">Users</span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{request()->route()->getName()=="users.create" ? ' active' : '' }}" href="{{route("users.create")}}">Add New</a>
                        </li>
                        <li>
                            <a class="{{request()->route()->getName()=="users.index" ? ' active' : '' }}" href="{{route("users.index")}}">List</a>
                        </li>
                    </ul>
                </li>
              <li class="{{request()->routeIs("transports*") ? ' open' : '' }}">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                    <i class="si si-bulb"></i><span class="sidebar-mini-hide">Transportverwaltung</span>
                </a>
                <ul>
                  <li>
                    <a class="{{request()->route()->getName()=="transports.create" ? ' active' : '' }}" href="{{route("transports.create")}}">Neuer Auftrag</a>
                  </li>
                  <li>
                    <a class="{{request()->route()->getName()=="transports.index" ? ' active' : '' }}" href="{{route("transports.index")}}">Erledigt</a>
                  </li>
                  <li>
                    <a class="{{request()->route()->getName()=="transports.calendar" ? ' active' : '' }}" href="{{route("transports.calendar")}}">Calendar</a>
                  </li>

                </ul>
              </li>
               <li class="{{ request()->routeIs("appointments*") ? ' open' : '' }}">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                    <i class="si si-energy"></i><span class="sidebar-mini-hide">Termin / Auftrag</span>
                </a>
                <ul>
                  <li>
                    <a class="{{ request()->route()->getName()=="appointments.create" ? ' active' : '' }}" href="{{route("appointments.create")}}">Neuer Auftrag</a>
                  </li>
                  <li>
                    <a class="{{ request()->route()->getName()=="appointments.index" ? ' active' : '' }}" href="{{route("appointments.index")}}">Erledigt</a>
                  </li>

                    <li>
                        <a class="{{request()->route()->getName()=="appointments.calendar" ? ' active' : '' }}" href="{{route("appointments.calendar")}}">Calendar</a>
                    </li>

                </ul>
              </li>

            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </div>
      <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-navicon"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Open Search Section -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
            <i class="fa fa-search"></i>
          </button>
          <!-- END Open Search Section -->

          <!-- Layout Options (used just for demonstration) -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-wrench"></i>
            </button>
            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
              <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
              <h6 class="dropdown-header">Color Themes</h6>
              <div class="row no-gutters text-center mb-5">
                <div class="col-2 mb-5">
                  <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
                <div class="col-2 mb-5">
                  <a class="text-elegance" data-toggle="theme" data-theme="{{ mix('/css/themes/elegance.css') }}" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
                <div class="col-2 mb-5">
                  <a class="text-pulse" data-toggle="theme" data-theme="{{ mix('/css/themes/pulse.css') }}" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
                <div class="col-2 mb-5">
                  <a class="text-flat" data-toggle="theme" data-theme="{{ mix('/css/themes/flat.css') }}" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
                <div class="col-2 mb-5">
                  <a class="text-corporate" data-toggle="theme" data-theme="{{ mix('/css/themes/corporate.css') }}" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
                <div class="col-2 mb-5">
                  <a class="text-earth" data-toggle="theme" data-theme="{{ mix('/css/themes/earth.css') }}" href="javascript:void(0)">
                    <i class="fa fa-2x fa-circle"></i>
                  </a>
                </div>
              </div>
              <h6 class="dropdown-header">Header</h6>
              <div class="row gutters-tiny text-center mb-5">
                <div class="col-6">
                  <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                </div>
                <div class="col-6">
                  <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                </div>
              </div>
              <h6 class="dropdown-header">Sidebar</h6>
              <div class="row gutters-tiny text-center mb-5">
                <div class="col-6">
                  <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                </div>
                <div class="col-6">
                  <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                </div>
              </div>
              <div class="d-none d-xl-block">
                <h6 class="dropdown-header">Main Content</h6>
                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
              </div>
            </div>
          </div>
          <!-- END Layout Options -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
          <!-- User Dropdown -->
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user d-sm-none"></i>
              <span class="d-none d-sm-inline-block">{{Auth::user()->name}}</span>
              <i class="fa fa-angle-down ml-5"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
              <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>

              <!-- END Side Overlay -->

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <i class="si si-logout mr-5"></i> Sign Out
              </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
          </div>
          <!-- END User Dropdown -->




        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->


      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
          <div class="content-header-item">
            <i class="fa fa-sun-o fa-spin text-white"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer">
      <div class="content py-20 font-size-sm clearfix">
        <div class="float-right">
          Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
        </div>
        <div class="float-left">
          <a class="font-w600" href="#" target="_blank">Codebase</a> &copy; <span class="js-year-copy"></span>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- Codebase Core JS -->
  <script src="{{ mix('js/codebase.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ mix('js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
