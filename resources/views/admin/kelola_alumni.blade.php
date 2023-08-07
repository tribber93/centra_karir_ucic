@extends('layouts.user_admin')
@section('judul', 'Kelola Alumni')
@section('konten')
    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Kelola Alumni</h2>
            </div>
            <div class="box-body">
                Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
                <div class="m-2 float-right">
                    <a href="/admin/kelola_alumni/tambah">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"></i> </span> Tambah Data Alumni
                        </button>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t">
                    <thead>
                        <tr>
                            <th data-toggle="true">
                                No.
                            </th>
                            <th>
                                Nama
                            </th>
                            <th data-hide="phone,tablet">
                                NIM
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Angkatan
                            </th>
                            <th data-hide="phone">
                                Jenjang
                            </th>
                            <th>
                                Prodi
                            </th>
                            <th>
                                Tahun Lulus
                            </th>
                            <th>
                                Status Kerja
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($alumni as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_alumni }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->angkatan }}</td>
                                <td>{{ $data->jenjang }}</td>
                                <td>{{ $data->prodi }}</td>
                                <td>{{ $data->tahun_lulus }}</td>
                                <td>{{ $data->status_kerja === 'true' ? 'Sudah' : 'Belum' }}</td>
                                <td data-value="3">
                                    <a href="/admin/kelola_alumni/edit/{{ $data->id }}">
                                        <button type="button" class="btn btn-info"><span><i class="fa fa-edit"></i></span>
                                            Edit</button>
                                    </a>
                                    <a href="/admin/kelola_alumni/delete/{{ $data->id }}">
                                        <button type="button" class="btn btn-danger"><span><i
                                                    class="fa fa-remove"></i></span>
                                            Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endforEach
                    </tbody>
                </table>
            </div>
            <footer class="dker p-a">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Bulk action</option>
                            <option value="1">Delete selected</option>
                            <option value="2">Bulk edit</option>
                            <option value="3">Export</option>
                        </select>
                        <button class="btn btn-sm white">Apply</button>
                    </div>
                    <div class="col-sm-4 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-0">
                            <li><a href><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href>1</a></li>
                            <li><a href>2</a></li>
                            <li><a href>3</a></li>
                            <li><a href>4</a></li>
                            <li><a href>5</a></li>
                            <li><a href><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- ############ PAGE END-->

@endsection
