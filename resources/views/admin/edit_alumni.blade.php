@extends('layouts.user_admin')
@section('judul', 'Edit Data Alumni')
@section('konten')
    <div class="padding">
        <div class="box p-3">
            <h3>Edit Data Alumni</h3>
            <br>
            <form class="p-x-xs" method="POST" action="/admin/kelola_alumni/edit/{{ $alumni->id }}">
                @csrf <!-- Add this line to include CSRF token -->

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="{{ $alumni->nama_alumni }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nim" value="{{ $alumni->nim }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="angkatan" value="{{ $alumni->angkatan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Jenjang</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenjang" placeholder="Pilih Program Studi">
                            <option value="S1" {{ $alumni->jenjang == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="D3" {{ $alumni->jenjang == 'D3' ? 'selected' : '' }}>D3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Program Studi</label>
                    <div class="col-sm-10">
                        @php
                            $list_prodi = ['Teknik Informatika', 'Sistem Informasi', 'Desain Komunikasi Visual', 'Manajemen Informatika', 'Komputer Akuntansi', 'Manajemen', 'Akutansi', 'Manajemen Bisnis'];
                        @endphp
                        <select class="form-control" name="prodi" placeholder="Pilih Program Studi">
                            @foreach ($list_prodi as $prodi)
                                <option value="{{ $prodi }}" {{ $alumni->prodi == $prodi ? 'selected' : '' }}>
                                    {{ $prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_lulus" value="{{ $alumni->tahun_lulus }}">
                    </div>
                </div>

        </div>

        <div class="form-group row">
            <div class="col-sm-4 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>

    </div>
@endsection
