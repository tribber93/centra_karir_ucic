    <!-- Header Area -->
    <header id="site-header" class="site-header">
        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('assets/images/cic.png') }}" alt="#"
                                    width="150"></a>
                        </div>
                        <!-- End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation ">
                                <ul class="nav menu">
                                    <li class="active"><a href="#home">Home</a></li>
                                    <li><a href="#info">Informasi</a></li>
                                    <li><a href="#testimonials">Kata Alumni</a></li>
                                    <li><a href="#footer">Kontak Kami</a></li>

                                </ul>
                            </nav>
                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                    <a href="/admin/dashboard" class="button">Dashboard</a>
                                @endif
                                @if (Auth::user()->role == 'alumni')
                                    <a href="/alumni/dashboard" class="button">Dasboard</a>
                                @endif

                                {{-- <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button">
                                {{ Auth::user()->name }}
                            </button> --}}
                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                            @else
                                <a href="/login" class="button">Login</a>

                            @endif
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Bottom -->
    </header>
    <!--/ End Header Area -->
