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
                </div>
            </div>

            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Alumni</th>
                            <!-- Loop through the questions and generate table headers -->
                            <
                           @foreach ($pertanyaan as $b )
                           <th>{{$b->pertanyaan}}</th>

                           @endforeach
                            <th data-hide="phone,tablet" data-name="Date Of Birth">Tanggal Tracer</th>
                            <th data-hide="phone">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($tracer as $data )
                       <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->alumni->nama_alumni }}</td>
                        @foreach($data->jawaban as $index => $item)
                        @if($index >= 0)
                            <!-- Kode yang ingin diulang untuk setiap $item dalam koleksi -->
                          <td> {{ $item['value'] }}</td>
                        @endif
                        @endforeach
                        {{-- @foreach($data->jawaban as $jawaban)
                            <td>

                            </td>
                            @endforeach --}}
                            <td>{{ date_format($data->created_at, 'd M Y') }}</td>
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
