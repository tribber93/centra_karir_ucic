@extends('layouts.master')
@section('judul', 'Detail')
@section('konten')
    {{-- Navbar --}}
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
                                <ul class="nav">
                                    <li><a href="/">Home</a></li>
                                    <li class="active"><a href="{{ url('/berita') }}">News</a></li>
                                    <li><a href="#testimonials">Testimonials</a></li>
                                    <li><a href="#footer">Contact Us</a></li>
                                    <li><a href="/login" class="button d-md-none">Login</a></li>
                                </ul>
                                <ul class="nav menu d-md-none">
                                    <li><a href="/">Home</a></li>
                                    <li class="active"><a href="{{ url('/berita') }}">News</a></li>
                                    <li><a href="#testimonials">Testimonials</a></li>
                                    <li><a href="#footer">Contact Us</a></li>
                                    <li><a href="/login" class="button d-md-none">Login</a></li>
                                </ul>
                            </nav>
                            <a href="/login" class="button">Login</a>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Bottom -->
    </header>
    <!--/ End Header Area -->
    {{-- end Navbar --}}

    {{-- Konten --}}
    <section id="berita" class="overflow-hidden">
        <div class="container-fluid judul2 mb-5 px-5">
            <h1><span style="color: #0352a1">|</span> {{ ucfirst($informasi->jenis_informasi) }}</h1>
        </div>
        <div class="row justify-content-around">
            <div class="col-12 col-md-7">
                <div class="row d-flex justify-content-start p-4 bg-light mb-5">
                    <article>
                        <h2>{{ $informasi->judul }}</h2>
                        <p class="meta">Oleh <span class="author">{{ $informasi->penulis }}</span> pada <span
                                class="date">{{ $informasi->created_at->diffForHumans() }}</span></p>
                        <img src="{{ asset($informasi->gambar) }}" alt="Gambar Artikel" class="img-fluid mb-4 rounded">
                        {!! $informasi->konten !!}
                        <div class="text-center my-5">
                            <a href="/informasi" class="btn btn-primary btn-read-more">Baca Artikel Lainnya</a>
                        </div>
                    </article>
                </div>
            </div>
            {{-- right side --}}
            <div class="col-12 col-md-3 mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="text-bold">Kategori</h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">Kategori 1</a></li>
                                    <li><a href="#">Kategori 2</a></li>
                                    <li><a href="#">Kategori 3</a></li>
                                    <li><a href="#">Kategori 4</a></li>
                                    <li><a href="#">Kategori 5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-12 mb-5">
                        <div class="card">
                            @if ($informasi->jenis_informasi == 'lowongan')
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Berita</h4>
                                    </li>
                                    <li class="list-group-item mt-3">
                                        <h5 class="card-title">Junior Web-Developer</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">12 Juli 2023</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Selengkapnya...</a>
                                    </li>
                                    <li class="list-group-item mt-3">
                                        <h5 class="card-title">Junior Web-Developer</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">12 Juli 2023</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Selengkapnya...</a>
                                    </li>

                                </ul>
                            @endif
                            @if ($informasi->jenis_informasi == 'berita')
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Lowongan</h4>
                                    </li>
                                    <li class="list-group-item mt-3">
                                        <h5 class="card-title">Junior Web-Developer</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">12 Juli 2023</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Selengkapnya...</a>
                                    </li>
                                    <li class="list-group-item mt-3">
                                        <h5 class="card-title">Junior Web-Developer</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">12 Juli 2023</h6>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="card-link">Selengkapnya...</a>
                                    </li>

                                </ul>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
            {{-- end right side --}}
            {{-- pagination --}}
            <div>
                @include('components.footer')
            </div>
            {{-- end pagination --}}
        </div>
    </section>
    {{-- End Konten --}}
@endsection
