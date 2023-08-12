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
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination my-5">
                        {{$alumni->links()}}
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <!-- ############ PAGE END-->

@endsection
