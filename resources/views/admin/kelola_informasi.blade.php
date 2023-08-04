@extends('layouts.user_admin')
@section('judul', 'Kelola Berita')
@section('konten')

    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Kelola Informasi (Berita/Lowongan)</h2>
                {{-- <small>Make HTML tables on smaller devices look awesome</small> --}}
            </div>
            <div class="box-body">
                Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
                <div class="m-2 float-right">
                    <a href="/admin/kelola_informasi/tambah">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"></i> </span> Tambah Informasi
                        </button>
                    </a>
                </div>
            </div>

            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead>
                        <tr>
                            <th data-toggle="true">
                                Penulis
                            </th>
                            <th>
                                Judul
                            </th>
                            <th data-hide="phone,tablet">
                                Jenis Informasi
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Kategori
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Dibuat pada
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Diperbarui pada
                            </th>
                            <th data-hide="phone">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infos as $info)
                            <tr>
                                <td>{{ $info->penulis }}</td>
                                <td>{{ $info->judul }}</td>
                                <td>{{ $info->jenis_informasi }}</td>
                                <td>{{ $info->kategori }}</td>
                                <td>{{ $info->created_at }}</td>
                                <td>{{ $info->updated_at }}</td>
                                <td data-value="3">
                                    <a href="/admin/kelola_informasi/edit/{{ $info->id }}">
                                        <button type="button" class="btn btn-info"><span><i class="fa fa-edit"></i></span>
                                            Edit</button>
                                    </a>
                                    <a href="/admin/kelola_informasi/delete/{{ $info->id }}">
                                        <button type="button" class="btn btn-danger"><span><i
                                                    class="fa fa-remove"></i></span>
                                            Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="hide-if-no-paging">
                        <tr>
                            <td colspan="5" class="text-center">
                                <ul class="pagination"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- ############ PAGE END-->

@endsection
