@extends('layouts.master')
@section('judul', 'Portal Berita')
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
                            <a href="/"><img src="assets/images/cic.png" alt="#" width="150"></a>
                        </div>
                        <!-- End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation ">
                                <ul class="nav">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li class="active"><a href="">News</a></li>
                                    <li><a href="#testimonials">Testimonials</a></li>
                                    <li><a href="#footer">Contact Us</a></li>
                                    <li><a href="/login" class="button d-md-none">Login</a></li>
                                </ul>
                                <ul class="nav menu d-md-none">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li class="active"><a href="">News</a></li>
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
            <h1><span style="color: #0352a1">|</span> Portal Berita</h1>
        </div>
        <div class="row justify-content-around">
            <div class="col-12 col-md-7">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="post-container">
                            <div class="post">
                                <div class="header_post">
                                    <img src="https://images.pexels.com/photos/2529973/pexels-photo-2529973.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                        alt="">
                                </div>

                                <div class="body_post">
                                    <div class="post_content">

                                        <h1>Lorem Ipsum</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi
                                            assumenda
                                        </p>

                                        <div class="container_infos">
                                            <div class="postedBy">
                                                <span>Published</span>
                                                Kamis, 30 Maret 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="post-container">
                            <div class="post">
                                <div class="header_post">
                                    <img src="https://images.pexels.com/photos/2529973/pexels-photo-2529973.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                        alt="">
                                </div>

                                <div class="body_post">
                                    <div class="post_content">

                                        <h1>Lorem Ipsum</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi
                                            assumenda
                                        </p>

                                        <div class="container_infos">
                                            <div class="postedBy">
                                                <span>Published</span>
                                                Kamis, 30 Maret 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="post-container">
                            <div class="post">
                                <div class="header_post">
                                    <img src="https://images.pexels.com/photos/2529973/pexels-photo-2529973.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                        alt="">
                                </div>

                                <div class="body_post">
                                    <div class="post_content">

                                        <h1>Lorem Ipsum</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi
                                            assumenda
                                        </p>

                                        <div class="container_infos">
                                            <div class="postedBy">
                                                <span>Published</span>
                                                Kamis, 30 Maret 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>

                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination my-5">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
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
                        </div>
                    </div>

                </div>

            </div>
            {{-- pagination --}}
            <div class="m-5">
                @include('components.footer')
            </div>
            {{-- end pagination --}}
        </div>
    </section>

    {{-- footer --}}
    {{-- @include('components.footer') --}}
    {{-- end footer --}}


@endsection
