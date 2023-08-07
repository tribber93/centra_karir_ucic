@extends('layouts.user_admin')
@section('judul', 'Tambah Data Alumni')
@section('konten')
    <div class="padding">
        <div class="box p-3">
            <h3>Tambah Data Alumni</h3>
            <br>
            <form class="p-x-xs" method="POST" action="/admin/kelola_alumni/tambah">
                @csrf <!-- Add this line to include CSRF token -->

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nim">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="angkatan">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Jenjang</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenjang" placeholder="Pilih Program Studi">
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Program Studi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="prodi" placeholder="Pilih Program Studi">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akutansi">Akutansi</option>
                            <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun_lulus">
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
