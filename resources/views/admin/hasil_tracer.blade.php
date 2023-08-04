@extends('layouts.user_admin')
@section('judul', 'Hasil Tracer Alumni')
@section('konten')

    {{-- @include('admin.sidebar') --}}


    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Hasil Tracer Alumni</h2>
                <small>Quesioner terisi</small>
            </div>
            <div class="box-body">
                Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
                <div class="m-2 float-right">
                    <a href="/admin/kelola_berita/tambah">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"></i> </span> Cetak
                        </button>
                    </a>
                </div>
            </div>

            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead>
                        <tr>
                            <th data-toggle="true">
                                Alumni
                            </th>
                            <th>
                                Pertanyaan
                            </th>
                            <th data-hide="phone,tablet">
                                Jawaban
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Tanggal Tracer
                            </th>
                            <th data-hide="phone">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracer as $data )

                        <tr>
                            <td>Isidra</td>
        <td><a href></a>
            Jawaban: {{ json_encode($data->jawaban) }}
        </td>
                            <td>Traffic Court Referee</td>
                            <td data-value="78025368997">22 Jun 1972</td>
                            <td>
                                <button type="button" class="btn btn-info"><span><i class="fa fa-edit"></i></span>
                                    Edit</button>
                                <button type="button" class="btn btn-danger"><span><i class="fa fa-remove"></i></span>
                                    Hapus</button>
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
