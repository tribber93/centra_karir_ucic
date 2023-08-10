@extends('layouts.user_admin')
@section('judul', 'Kelola Partner')
@section('konten')
    <div class="container">
        <div class="box m-2">
            <div class="box-header">
                <h2>Kelolo Partner</h2>
                <small>
                    Logo partner akan ditampilkan dihalaman awal web
                </small>
            </div>
            <div class="box-body">
                <div class="m-2 float-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Partner
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form role="form" method="POST" action="/admin/partner" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Partner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="namaPartner">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="namaPartner"
                                                placeholder="Masukan nama partner" name="namaPartner" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="logoPartner">File input</label>
                                            <input type="file" id="logoPartner" class="form-control" name="logoPartner"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Perusahaan/Partner</th>
                            <th>Logo Partner</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($partner as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama_partner }}</td>
                                <td><img src="{{ asset($p->logo_partner) }}" alt="" width="50"></td>
                                <td>{{ $p->created_at->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#editModal"><span><i class="fa fa-edit"></i></span>
                                        Edit</button>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editModal">
                                            + Tambah Partner
                                        </button> --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form role="form" method="POST"
                                                    action="/admin/partner/edit/{{ $p->id }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Partner
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="editNamaPartner">Nama Perusahaan</label>
                                                            <input type="text" class="form-control" id="editNamaPartner"
                                                                placeholder="Masukan nama partner" name="editNamaPartner"
                                                                value="{{ $p->nama_partner }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="editLogoPartner">File input</label>
                                                            <input type="file" id="editLogoPartner" class="form-control"
                                                                name="editLogoPartner">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/partner/hapus/{{ $p->id }}">
                                        <button type="button" class="btn btn-danger"><span><i
                                                    class="fa fa-remove"></i></span>
                                            Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
