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
                            <span><i class="fa fa-plus"></i> </span> Cetak
                        </button>
                    </a>

                    <button class="btn btn-success" data-toggle="modal" onclick="getCountData()" >Backup</button>
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
          <p>setelah anda klik "Ya", maka alumni akan mengisi ulang tracer, Apakah anda yakin akan membackup ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success btn-backup" data-dismiss="modal" >Ya</button>
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
            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Alumni</th>
                            <!-- Loop through the questions and generate table headers -->
                            <th>nama P</th>
                            <th>Posisi</th>
                            <th>Mulai</th>
                           @foreach ($pertanyaan as $b )
                           <th>{{$b->pertanyaan}}</th>

                           @endforeach
                            <th data-hide="phone,tablet" data-name="Date Of Birth">Tanggal Tracer</th>
                            <th data-hide="phone">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracer as $data )
                       <tr>
                        <td>{{ $data->alumni->nama_alumni }}</td>
                        @foreach($data->jawaban as $index => $item)
                        @if($index >= 0)
                            <!-- Kode yang ingin diulang untuk setiap $item dalam koleksi -->
                          <td> {{ $item['value'] }}</td>
                        @endif
                    @endforeach
                        {{-- @foreach($data->jawaban as $jawaban)
                        <td>

                                {{ $jawaban['value'] }}
                            </td>
                            @endforeach --}}
                        </tr>
                            @endforeach


                    </tbody>
                </table>
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
    </div>
</div>
    <!-- ############ PAGE END-->

@stop
