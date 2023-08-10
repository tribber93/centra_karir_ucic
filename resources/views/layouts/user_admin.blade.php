<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('judul')</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{ asset('admin/css/images/logo.png') }}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('admin/css/images/logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css/animate.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/css/glyphicons/glyphicons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/css/material-design-icons/material-design-icons.css') }}"
        type="text/css" />

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
    <!-- build:css admin/css/styles/app.min.css -->
    <link rel="stylesheet" href="{{ asset('admin/css/styles/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles/custom.css') }}" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('admin/css/styles/font.css') }}" type="text/css" />
</head>

<body>
    <div class="app" id="app">
        @if (Auth::user()->role == 'admin')
            @include('admin.sidebar');
        @else
            @include('alumni.sidebar');
            @php
                $var = App\Models\Alumni::where('user_id', Auth::user()->id)->firstOrfail();
            @endphp
        @endif
        <!-- content -->
        <div id="content" class="app-content box-shadow-z0" role="main">
            <div class="app-header white box-shadow">
                <div class="navbar navbar-toggleable-sm flex-row align-items-center">
                    <!-- Open side - Naviation on mobile -->
                    <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                        <i class="material-icons">&#xe5d2;</i>
                    </a>
                    <!-- / -->

                    <!-- Page title - Bind to $state's title -->
                    <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

                    <!-- navbar collapse -->
                    <div class="collapse navbar-collapse" id="collapse">


                        <div ui-include="'../views/blocks/navbar.form.html'"></div>
                        <!-- / -->
                    </div>
                    <!-- / navbar collapse -->

                    <!-- navbar right -->
                    <ul class="nav navbar-nav ml-auto flex-row">
                        <li class="nav-item dropdown">
                            <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                                <span class="avatar w-32">
                                    {{-- <img class="" data-toggle="dropdown"
                                        src="{{ asset('admin/css/images/a0.jpg') }}" alt="..."> --}}
                                    @if (Auth::user()->role == 'admin')
                                        <img src="{{ asset('img\user.png') }}" class="dropdown-toggle">
                                        {{-- {{ $dataDiskusi->alumni->image }} --}}
                                    @else
                                        <img src="{{ $var->image == null ? asset('img\user.png') : asset($var->image) }}"
                                            class="dropdown-toggle">
                                    @endif
                                    <i class="on b-white bottom"></i>
                                </span>
                            </a>
                            <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                        </li>

                        <li class="nav-item">
                            <button class="btn white btn-sm dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu dropdown-menu-scale pull-right">
                                <a href="{{ route('profil-alumni') }}" class="dropdown-item"
                                    href>{{ Auth::user()->name }}</a>
                                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item" href>Logout</a>
                                <form style=" opacity: 0;  pointer-events: none;" id="logout-form"
                                    action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    {{-- <ul class="nav navbar-nav ml-auto flex-row justify-items-end">
                        <li class="nav-item dropdown ">
                            <div class="btn-group dropdown">
                                <span class="avatar h-50">
                                    <img class="dropdown-toggle" data-toggle="dropdown"
                                        src="{{ asset('admin/css/images/a0.jpg') }}" alt="...">
                                    <i class="on b-white bottom"></i>
                                </span>
                                <button class="btn white btn-sm dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu dropdown-menu-scale pull-right">
                                    <a class="dropdown-item" href>{{ Auth::user()->name }}</a>
                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item" href>Logout</a>
                                    <form style=" opacity: 0;  pointer-events: none;" id="logout-form"
                                        action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div ui-include="'../views/blocks/dropdown.user.html'"></div>

                        </li>
                    </ul> --}}
                    <!-- / navbar right -->
                </div>
            </div>
            <div class="app-footer">
                <div class="p-2 text-xs">
                    <div class="pull-right text-muted py-1">
                        &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love
                            v1.1.3</span>
                        <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                    </div>
                    <div class="nav">
                        <a class="nav-link" href="../">About</a>
                        <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get
                            it</a>
                    </div>
                </div>
            </div>
            <div ui-view class="app-body" id="view">

                <!-- ############ PAGE START-->
                @yield('konten')
                <!-- ############ PAGE END-->

            </div>
        </div>
        <!-- / -->
    </div>

    <!-- build:js scripts/app.html.js -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('admin/libs/jquery/jquery/dist/jquery.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/libs/jquery/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
    <!-- core -->
    <script src="{{ asset('admin/libs/jquery/underscore/underscore-min.js') }}"></script>
    <script src="{{ asset('admin/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jquery/PACE/pace.min.js') }}"></script>

    <script src="{{ asset('admin/scripts/config.lazyload.js') }}"></script>

    <script src="{{ asset('admin/scripts/palette.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-load.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-jp.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-include.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-device.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-form.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-nav.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-screenfull.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-scroll-to.js') }}"></script>
    <script src="{{ asset('admin/scripts/ui-toggle-class.js') }}"></script>

    <script src="{{ asset('admin/scripts/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/ajax_admin.js') }}"></script>

    <!-- ajax -->
    <script src="{{ asset('admin/libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script>
    <script src="{{ asset('admin/scripts/ajax.js') }}"></script>
    <script src="{{ asset('js/diskusi2.js') }}"></script>
    <script src="{{ asset('js/diskusi1.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}

    <!-- endbuild -->
    @yield('scripts')
</body>

</html>
