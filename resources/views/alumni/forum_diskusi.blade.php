@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')

{{-- @include('alumni.sidebar') --}}
<div class="container mt-4">
  <h1 class="text-center">Forum Diskusi</h1>
  <form id="my-form" ui-jp="parsley">
    <div class="box m-3">
      <div class="box-header">
        <h2 class="judul">Buat diskusi baru</h2>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>Judul Diskusi</label>
          <input type="text" name="judul" id="judul" required class="form-control" placeholder="Masukan Judul Diskusi">
        </div>
        <div class="form-group">
          <label>Isi Diskusi</label>
          <input type="text" name="isi" id="isi" required class="form-control" placeholder="Masukan isi Diskusi">
        </div>
      </div>
    </div>
    <div class="dker p-a text-right">
      <button type="button" onclick="handleFormSubmitDiskusi2()" class="btn info">Submit</button>
    </div>
  </form>

  <div class="container p-4">
    <div class="justify-content-center g-2">
      @foreach ($diskusi as $data)
      <div class="list box">
        <div class="list-item mb-3">
          <div class="list-left">
            @if ($data->user->role == 'admin')
            <img src="{{ asset('img\user.png') }}" class="w-40 circle">
            @else
            <img src="{{ $data->alumni->image == null ? asset('img\user.png') : asset($data->alumni->image) }}" class="w-40 circle">
            @endif
          </div>
          <div class="list-body">
            <div class="row col-12">
              <h6 class="row col-10 mt-2">{{ $data->user->name }}</h6>
              @if (Auth::user()->name == $data->user->name)
              <button class="btn primary btn-sm dropdown-toggle" data-toggle="dropdown">
                {{-- <span style="display: none" id="changeText">Ubah Komentar</span> --}}
              </button>
              <div class="dropdown-menu dropdown-menu-scale pull-right">
                <a class="dropdown-item delete-button" data-comment-id="{{ $data->id }}" href>Hapus</a>
                <a class="dropdown-item edit-button" data-discussion-id="{{ $data->id }}" class="dropdown-item">Ubah</a>
              </div>
              @endif
            </div>
            <small class="block text-muted">{{ $data->created_at->diffForHumans() }}</small>
            <br>
            <a href="#">
              <h4>{{ $data->judul }}</h4>
            </a>
            <p>{{ $data->isi }}</p>
            <a href="/komentar/forum_diskusi/{{ $data->id }}">
              <i class="material-icons md-24">
                &#xe0b9;
                <span ui-include="'../assets/images/i_0.svg'"></span>
              </i>
              <span class="m-l-sm">{{ $jumlahKomentarPerDiskusi[$data->id] }}</span>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  {{-- modal --}}
  <div id="m-a-f" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hallo, {{Auth::user()->name}}</h5>
        </div>
        <div class="modal-body text-center p-lg">
          <p>Anda Yakin akan menghapus Diskusi ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Tidak</button>
          <button type="button" class="btn indigo p-x-md" data-dismiss="modal">Ya</button>
        </div>
      </div><!-- /.modal-content -->
    </div>
  </div>
</div>


@endsection
