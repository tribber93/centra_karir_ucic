@extends('layouts.master')
@if (url()->current() == url('/berita'))
    @section('judul', 'Portal Berita')
@else
    @section('judul', 'Portal Lowongan')
@endif
{{-- @section('judul', 'Portal Berita') --}}
@section('konten')
    {{-- Navbar --}}
    <!-- Header Area -->
    @include('homepage.navbar')
    <!--/ End Header Area -->
    {{-- end Navbar --}}
    {{-- Konten --}}
    <section id="berita" class="overflow-hidden">
        <div class="container-fluid judul2 mb-5 px-5">
            <h1><span style="color: #0352a1">|</span> Portal {{ url()->current() == url('/berita') ? 'Berita' : 'Lowongan' }}
            </h1>
        </div>
        <div class="row justify-content-around">
            <div class="col-12 col-md-7">
                <div class="row d-flex justify-content-start">
                    @foreach ($informasi as $info)
                        <div class="col-md-6 col-12">
                            <!-- Single Blog -->
                            <div class="post-container">
                                <div class="post">
                                    <div class="header_post">
                                        <img src="{{ asset($info->gambar) }}" alt="">
                                    </div>
                                    <a href="/detail-informasi/{{ $info->id }}">
                                        <div class="body_post">
                                            <div class="post_content">

                                                <h1>{{ Str::limit($info->judul, 50) }}</h1>
                                                <p>{!! Str::limit($info->konten, 75) !!}</p>

                                                <div class="container_infos row">
                                                    <div class="col-5">
                                                        <div class="postedBy">
                                                            <span>Published</span>
                                                            {{ $info->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="postedBy">
                                                            <span>Jenis</span>
                                                            {{ $info->jenis_informasi }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <!-- End Single Blog -->
                        </div>
                    @endforEach
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
                            @if (url()->current() == url('/lowongan'))
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Berita</h4>
                                    </li>

                                    </li>
                                    @foreach ($berita as $item)
                                        <li class="list-group-item mt-3">
                                            <h5 class="card-title">{{ $item->judul }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $item->created_at->diffForHumans() }}</h6>
                                            <p class="card-text">{!! Str::limit($item->konten, 100) !!}</p>
                                            <a href="/detail-informasi/{{ $item->id }} "
                                                class="card-link">Selengkapnya...</a>
                                        </li>
                                    @endforeach


                                </ul>
                            @endif
                            @if (url()->current() == url('/berita'))
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Lowongan</h4>
                                    </li>
                                    @foreach ($lowongan as $item)
                                        <li class="list-group-item mt-3">
                                            <h5 class="card-title">{{ Str::limit($item->judul, 100) }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $item->created_at->diffForHumans() }}</h6>
                                            <p class="card-text">{!! Str::limit($item->konten, 100) !!}</p>
                                            <a href="/detail-informasi/{{ $item->id }} "
                                                class="card-link">Selengkapnya...</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
            {{-- pagination --}}
            <div>
                @include('components.footer')
            </div>
            {{-- end pagination --}}
        </div>
    </section>
    {{-- End Konten --}}

    {{-- footer --}}
    {{-- @include('components.footer') --}}
    {{-- end footer --}}


@endsection
