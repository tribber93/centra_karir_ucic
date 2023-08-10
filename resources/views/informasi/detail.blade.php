@extends('layouts.master')
@section('judul', 'Detail')
@section('konten')
    {{-- Navbar --}}
    <!-- Header Area -->
    @include('homepage.navbar')
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
                        <div class="konten">
                            {!! $informasi->konten !!}
                        </div>

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
                                @foreach ($kategori as $item)
                                    <ul>
                                        <li><a href="#">{{ $item->kategori }}</a></li>

                                    </ul>
                                @endforeach

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
                            @if ($informasi->jenis_informasi == 'berita')
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Lowongan</h4>
                                    </li>
                                    @foreach ($lowongan as $item)
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
