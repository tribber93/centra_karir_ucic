@extends('layouts.user_admin')
@section('judul', 'Alumni Dashboard')
@section('konten')
    {{-- @include('alumni.sidebar') --}}
    <div class="container">
        <div class="row m-3 ">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3>Lowongan</h3>
                    </div>
                    <div class="box-divider m-0"></div>
                    <ul class="list no-border">
                        @foreach ($lowongan as $dataLowongan)
                            <li class="list-item">
                                <a herf class="pull-left m-r">
                                    <span class="w-40">
                                        <img src="{{ asset($dataLowongan->gambar) }}" class="w-full" alt="...">
                                    </span>
                                </a>
                                <div class="clear">
                                    <a href="/detail-informasi/{{ $dataLowongan->id }}"
                                        class="_500 text-ellipsis">{{ $dataLowongan->judul }}</a>
                                    <small class="text-muted">{{ $dataLowongan->created_at->diffForHumans() }}</small>
                                </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3>Berita/Informasi</h3>
                    </div>
                    <div class="box-divider m-0"></div>
                    <ul class="list no-border">
                        @foreach ($berita as $dataBerita)
                            <li class="list-item">
                                <a class="pull-left m-r">
                                    <span class="w-40">
                                        <img src="{{ asset($dataBerita->gambar) }}" class="w-full" alt="...">
                                    </span>
                                </a>
                                <a href="/detail-informasi/{{ $dataBerita->id }}"
                                    class="_500 text-ellipsis">{{ $dataBerita->judul }}</a>
                                <small class="text-muted">{{ $dataBerita->created_at->diffForHumans() }}</small>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="box">
                    <div class="box-header">
                        <span class="label success pull-right">5</span>
                        <h3><a href="/alumni/forum_diskusi">Forum Diskusi</a></h3>
                        <small>5 postingan diskusi terbaru</small>
                    </div>
                    <div class="box-body">
                        <div class="streamline b-l m-b m-l">
                            @if (empty($diskusi))
                                cok
                            @else
                                @foreach ($diskusi as $dataDiskusi)
                                    <div class="sl-item">
                                        <div class="sl-left">
                                            @if ($dataDiskusi->user->role == 'admin')
                                                <img src="{{ asset('img\user.png') }}" class="img-circle">
                                                {{-- {{ $dataDiskusi->alumni->image }} --}}
                                            @else
                                                <img src="{{ $dataDiskusi->alumni->image == null ? asset('img\user.png') : asset($dataDiskusi->alumni->image) }}"
                                                    class="img-circle">
                                            @endif
                                        </div>
                                        <div class="sl-content">
                                            <div class="row">
                                                <p class="text-info">{{ $dataDiskusi->user->name }}</p>
                                                <span
                                                    class="m-l-sm sl-date">{{ $dataBerita->created_at->diffForHumans() }}</span>
                                            </div>

                                            <div><a
                                                    href="/komentar/forum_diskusi/{{ $dataDiskusi->id }}">{{ $dataDiskusi->judul }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <a href class="btn btn-sm white text-u-c m-y-xs">Load More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
