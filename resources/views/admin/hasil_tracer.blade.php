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
                    <a href="/export/tracer ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            </span> Export ke Excel
                        </button>
                    </a>

                    <button class="btn btn-success" data-toggle="modal" onclick="getCountData()">Backup</button>
                </div>
            </div>
            <!-- .modal -->
            <div id="m-a-f" class="modal fade" data-backdrop="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hallo Admin </h5>
                        </div>
                        <div class="modal-body p-lg">
                            <p id="pp"></p>
                            <p>setelah anda klik "Ya", maka alumni akan mengisi ulang tracer, Apakah anda yakin akan
                                membackup ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success btn-backup" data-dismiss="modal">Ya</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            <div id="m-a-G" class="modal fade" data-backdrop="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sukses </h5>
                        </div>
                        <div class="modal-body p-lg">
                            <p>Sukses Membackup Sebanyak <span id="backupCount">0</span> data</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success btn-backup" data-dismiss="modal">Ya</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            <!-- / .modal -->
            <div class="table-responsive">
                <table id="tracer-table" class="table table-striped b-t">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Alumni</th>
                            @if (count($tracer) > 0)
                                @foreach ($tracer[0]->jawaban as $b)
                                    <th>{{ Str::limit($b['pertanyaan'], 30) }}</th>
                                @endforeach

                            @endif
                            <th>Tanggal Tracer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($tracer as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->alumni->nama_alumni }}</td>
                                @foreach ($data->jawaban as $item)
                                    {{-- @if ($index >= 0) --}}
                                    <!-- Kode yang ingin diulang untuk setiap $item dalam koleksi -->
                                    <td> {{ $item['value'] }}</td>
                                    {{-- @endif --}}
                                @endforeach
                                {{-- @foreach ($data->jawaban as $jawaban)
                            <td>

                            </td>
                            @endforeach --}}
                                <td>{{ date_format($data->created_at, 'd M Y') }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    <!-- ############ PAGE END-->


@stop
