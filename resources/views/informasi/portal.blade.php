@extends('layouts.master')

@section('konten')

    @include('homepage.navbar')

    <section id="berita" class="overflow-hidden">
        <div class="container-fluid judul2 mb-5 px-5">
            <h1><span style="color: #0352a1">|</span>  {{ $judul}}
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
                                                <p>{!! substr($info->konten, 0, 200) !!}...</p>

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
                        {{ $informasi->links() }}
                    </ul>
                </nav>
            </div>
            <div class="col-12 col-md-3 mb-5">
                <div class="row justify-content-center">
                    {{-- <div class="col-10 col-md-12 mb-5">

                    </div> --}}
                    <div class="col-10 col-md-12 mb-5">
                        @if (url()->current() == url('/lowongan'))
                        <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Berita</h4>
                                    </li>
                                    @foreach ($berita as $item)
                                        <li class="list-group-item mt-3">
                                            <h5 class="card-title">{{ $item->judul }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $item->created_at->diffForHumans() }}</h6>


                                            <p class="card-text">{!! substr($info->konten, 0, 200) !!}</p>
                                            <a href="/detail-informasi/{{ $item->id }} "
                                                class="card-link">Selengkapnya...</a>
                                        </li>
                                        @endforeach


                                </ul>
                            </div>
                            @endif
                            @if(url()->current() == url('/berita'))
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center bg-light">
                                        <h4 class="font-weight-bold">Lowongan</h4>
                                    </li>
                                    @foreach ($lowongan as $item)
                                        <li class="list-group-item mt-3">
                                            <h5 class="card-title">{{ Str::limit($item->judul, 100) }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $item->created_at->diffForHumans() }}</h6>
                                                <p class="card-text">{!! substr($item->konten, 0, 200) !!}</p>

                                            <a href="/detail-informasi/{{ $item->id }} "
                                                class="card-link">Selengkapnya...</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                                {{-- @elseif ($judul == 'event')
                                <p></p> --}}
                            @endif

                            {{-- event kampus --}}

                            <div class="col-10 col-md-12 mb-5">
                                @if (url()->current() == url('/event'))
                                <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-center bg-light">
                                                <h4 class="font-weight-bold">Event Kampus</h4>
                                            </li>
                                            @foreach ($info_event as $item)
                                                <li class="list-group-item mt-3">
                                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $item->created_at->diffForHumans() }}</h6>
                                                        <p class="card-text">{!! substr($item->konten, 0, 200) !!}</p>

                                                    <a href="/detail-informasi/{{ $item->id }} "
                                                        class="card-link">Selengkapnya...</a>
                                                </li>
                                                @endforeach


                                        </ul>
                                    </div>
                                    @endif
                        </div>
                    </div>

                </div>

            </div>
            <div>
                @include('components.footer')
            </div>
        </div>
    </section>



@endsection
