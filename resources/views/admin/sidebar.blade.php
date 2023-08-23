<div id="aside" class="app-aside modal nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
            <!-- brand -->
            <a class="navbar-brand">
                <div ui-include="'../assets/images/logo.svg'"></div>
                <img src="../assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">Sentra Karir</span>
            </a>
            <!-- / brand -->
        </div>
        <div class="hide-scroll" data-flex>
            <nav class="scroll nav-light">

                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">Menu</small>
                    </li>

                    <li>
                        <a href="/admin/dashboard">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;
                                    <span ui-include="'../assets/images/i_0.svg'"></span>
                                </i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/kelola_alumni') }}">
                            <span class="nav-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </span>
                            <span class="nav-text">Kelola Alumni</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/admin/kelola_tracer">
                            <span class="nav-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </span>
                            <span class="nav-text">Kelola Tracer</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url('admin/kelola_informasi') }}">
                            <a href="{{ url('admin/hasil_tracer') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </span>
                                <span class="nav-text">Hasil Tracer</span>
                            </a>
                    </li> --}}
                    <li>
                        <a href="{{ url('admin/kelola_informasi') }}">
                            <span class="nav-icon">
                                <i class="fa fa-newspaper-o"></i>
                            </span>
                            <span class="nav-text">Kelola Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/forum_diskusi') }}">
                            <span class="nav-icon">
                                <i class="fa fa-comments-o"></i>
                            </span>
                            <span class="nav-text">Forum Diskusi</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('admin/testimoni_alumni') }}">
                            <span class="nav-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="nav-text">Testimoni Alumni</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url('admin/partner') }}">
                            <span class="nav-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="nav-text">Kelola Partner</span>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url('/admin/backup-data') }}">
                            <span class="nav-icon">
                                <i class="fa fa-download"></i>
                            </span>
                            <span class="nav-text">Backup data</span>
                        </a>

                    </li> --}}
                </ul>
            </nav>
        </div>

    </div>
</div>
<!-- / -->
