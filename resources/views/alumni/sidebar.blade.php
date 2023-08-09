<div id="aside" class="app-aside modal nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
            <!-- brand -->
            <a class="navbar-brand">
                <div ui-include="'../assets/images/logo.svg'"></div>
                <img src="../assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">Flatkit</span>
            </a>
            <!-- / brand -->
        </div>
        <div class="hide-scroll" data-flex>
            <nav class="scroll nav-light">

                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">Main</small>
                    </li>

                    <li>
                        <a href="/alumni/dashboard">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;
                                    <span ui-include="'../assets/images/i_0.svg'"></span>
                                </i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('alumni/tracer_study') }}">
                            <span class="nav-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </span>
                            <span class="nav-text">Tracer Study</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/alumni/forum_diskusi') }}">
                            <span class="nav-icon">
                                <i class="fa fa-comments-o"></i>
                            </span>
                            <span class="nav-text">Forum Diskusi</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="b-t">
            <div class="nav-fold">
                <a href="{{ route('profil-alumni') }}">
                    <span class="pull-left">
                        <img src="{{ asset('admin/css/images/a0.jpg') }}" alt="..." class="w-40 img-circle">
                    </span>
                    <span class="clear hidden-folded p-x">
                        <span class="block _500">Jean Reyes</span>
                        <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- / -->
