@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')
{{-- @include('admin.sidebar') --}}

<div class="container mt-4">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3>Diskusi <span class="label success">{{ $dkC }}</span></h3>
            </div>
            <div class="box-body">
                <div class="streamline m-b m-l">
                    <div class="sl-item">
                        <div class="sl-left">
                            @if ($diskusi->user->role == 'admin')
                            <img src="{{ asset('img\user.png') }}" class="w-40 circle">
                            @else
                            <img src="{{ $diskusi->alumni->image == null ? asset('img\user.png') : asset($diskusi->alumni->image) }}"
                                class="w-40 circle">
                            @endif
                        </div>
                        <div class="sl-content">
                            <div class="sl-date text-muted">{{ $diskusi->created_at->diffForHumans() }}</div>
                            <div class="sl-author">
                                <a href>{{ $diskusi->user->name }}</a>
                            </div>
                            <div>
                                <p data-id="{{ $diskusi->id }}">{{ $diskusi->isi }}</p>
                            </div>
                            <div class="sl-footer">
                                <a href data-toggle="collapse" data-target="#reply-1">
                                    <i class="fa fa-fw fa-mail-reply text-muted"></i> Balas
                                </a>
                            </div>
                            <div class="box collapse m-0 b-a" id="reply-1">
                                <form>
                                    <textarea name="isi" id="isi" class="form-control no-border" rows="3"
                                        placeholder="Ketikkan Sesuatu..."></textarea>
                                </form>
                                <div class="box-footer clearfix">
                                    <button type="button" onclick="handleFormSubmit()"
                                        class="btn btn-info pull-right btn-sm">Balas</button>
                                    <ul class="nav nav-pills nav-sm">
                                        <li class="nav-item"><a class="nav-link" href><i
                                                    class="fa fa-camera text-muted"></i></a></li>
                                        <li class="nav-item"><a class="nav-link" href><i
                                                    class="fa fa-video-camera text-muted"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sl-item">
                        <div class="sl-content">
                            @foreach ($dk as $data)
                            <div class="sl-item">
                                <div class="sl-left">
                                    @if ($data->user->role == 'admin')
                                    <img src="{{ asset('img\user.png') }}" class="img-circle">
                                    @else
                                    <img src="{{ $data->alumni->image == null ? asset('img\user.png') : asset($data->alumni->image) }}"
                                        class="w-40 circle">
                                    @endif
                                </div>
                                <div class="sl-content">
                                    <div class="sl-date text-muted">{{ $data->created_at->diffForHumans() }}</div>
                                    <div data-id="{{ $data->id }}" class="sl-author user-name">
                                        <a href>{{ $data->user->name }}</a>
                                    </div>
                                    <div class="row col-12">
                                        <p class="text-info col-10" style="">{{ $data->isi }}</p>
                                        @if ($auth == $data->user->name)
                                        <button class="btn primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <span style="display: none" id="changeText">Ubah Komentar</span>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-scale pull-right">
                                            <a class="dropdown-item delete-button" data-comment-id="{{ $data->id }}"
                                                href>Hapus</a>
                                            <a class="dropdown-item edit-button" href data-toggle="collapse"
                                                data-target="#reply-{{ $data->id }}" class="dropdown-item">Ubah</a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="box collapse m-0 b-a list-body" id="reply-{{ $data->id }}">
                                        <form>
                                            <textarea class="form-control no-border edit-input" rows="3"
                                                placeholder="Ubah .. "></textarea>
                                        </form>
                                        <div class="box-footer clearfix">
                                            <button type="button" class="btn btn-info pull-right btn-sm save-edited-comment">Ubah</button>
                                            <ul class="nav nav-pills nav-sm">
                                                <li class="nav-item"><a class="nav-link" href><i
                                                            class="fa fa-camera text-muted"></i></a></li>
                                                <li class="nav-item"><a class="nav-link" href><i
                                                            class="fa fa-video-camera text-muted"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
