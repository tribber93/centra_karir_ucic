@extends('layouts.user_admin')
@section('judul', 'Tracer Study')
@section('konten')
    {{-- @include('alumni.sidebar') --}}
    <div class="container mt-4">
        <h1 class="text-center">Tracer Study</h1>
        <div class="padding box ">
            <form class=" p-x-xs">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->nama_alumni}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->angkatan}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Jenjang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->jenjang}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->prodi}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->nim}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$alumni->tahun_lulus}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">No. Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="{{$alumni->no_telpon}}">
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="col-2 form-control-label" for="tracerCheckbox">Sudah Bekerja?</label>
                    <div class="col-10">
                        <input type="checkbox" id="tracerCheckbox" checked>
                    </div>
                </div>

                <div class="form-group row form-input" data-target="tracerCheckbox">
                    <label class="col-sm-2 form-control-label" for="additionalInput1">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="additionalInput1">
                    </div>
                </div>
                <div class="form-group row form-input" data-target="tracerCheckbox">
                    <label class="col-sm-2 form-control-label" for="additionalInput1">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="additionalInput1">
                    </div>
                </div>
                <div class="form-group row form-input" data-target="tracerCheckbox">
                    <label class="col-sm-2 form-control-label" for="additionalInput1">Mulai Bekerja</label>
                    <div class='col-sm-4 input-group date' ui-jp="datetimepicker"
                        ui-options="{
                        icons: {
                          time: 'fa fa-clock-o',
                          date: 'fa fa-calendar',
                          up: 'fa fa-chevron-up',
                          down: 'fa fa-chevron-down',
                          previous: 'fa fa-chevron-left',
                          next: 'fa fa-chevron-right',
                          today: 'fa fa-screenshot',
                          clear: 'fa fa-trash',
                          close: 'fa fa-remove'
                        }
                      }">
                        <input type='text' class="form-control">
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>








                   {{--  --}}
                   @if ($status_tracer)
                 <center>  Anda sudah tracer studi pada tanggal xx-xx-xx</center>

                   @else

                   <table class="table row form-input" data-target="tracerCheckbox">
                    <thead class="thead-lightform-group">
                        <tr class="text-center align-items-center">
                            <th class="col-7">MENURUT ANDA SEBERAPA BESAR PENEKANAN PADA METODE PEMBELAJARAN DI BAWAH INI DILAKSANAKAN DI PROGRAM STUDI ANDA?</th>
                            <th>TIDAK SAMA SEKALI</th>
                            <th>KURANG</th>
                            <th>CUKUP BESAR</th>
                            <th>BESAR</th>
                            <th>SANGAT BESAR</th>
                        </tr>
                    </thead>
                    <span class="error-message" id="error-radioGroup2" style="display: none; color: red;">Pilih salah satu opsi</span>

                    <tbody style="width: 100%">
                        @foreach ($tracer as $data)
                            @if (empty(json_decode($data['opsi'])))
                            <tr>
                                <td class="col-12">
                                    <span id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"  class="error">Belum Terisi</span>

                                    <label style="font-weight: 600">{{$data['pertanyaan']}}</label>
                                    <div class="form-group row form-input" data-target="tracerCheckbox">
                                        <input type="text" name="{{ $data['id'] }}" class="additional-input3 form-control" id="{{ $data['id'] }}" onchange="handleInputChange(this)">
                                    </div>
                                </td>
                            </tr>
                            @elseif ($data['opsi'] === '["SANGAT BESAR","BESAR","CUKUP BESAR","KURANG","TIDAK SAMA SEKALI"]')
                                <tr>
                                    <td class="col-12 text-lowercase" >
                                        <span id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"  class="error">Belum Terisi</span>
                                        {{ $data['pertanyaan'] }}
                                    </td>
                                    @foreach (json_decode($data['opsi']) as $opsi)
                                     <td class="" style="padding-right: 40px">
                                            <label class="md-check">
                                                <input type="radio" name="{{ $data['id'] }}" value="{{ $opsi }}" class="" onclick="handleRadioClick(this)">
                                                <i class="blue"></i>
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="option form-input " data-target="tracerCheckbox">
                                            <div id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"  class="error">Belum terisi</div>

                                            <h6 class="font-weight-bold">{{ $data['pertanyaan'] }}</h6>
                                            {{-- <br> --}}

                                            @foreach (json_decode($data['opsi']) as $opsi)
                                                <div class="form-group row pl-3">
                                                    <label class="md-check text-lowercase">
                                                        <input type="radio" name="{{ $data['id'] }}" value="{{ $opsi }}" onclick="handleRadioClick(this)">

                                                        <i class="blue"></i>
                                                        {{ $opsi }}

                                                    </label>
                                                </div>


                                                @endforeach
                                                <input type="text" class="form-control" name="{{ $data['id'] }}-text" class="form-control" style="display: none;" id="{{$data['id']}}-text" value="Tulis jika lainnya">


                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
        <button type="button" id="btnGetData" class="md-btn md-raised m-b-sm w-xs indigo">Simpan</button>
        @endif



                {{--  --}}
            </form>
        </div>
    </div>
    <!-- .modal -->
    <div id="m-a-a" class="modal fade animate" data-backdrop="true">
        <div class="modal-dialog" id="animate">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hallo {{ Auth::user()->name}}</h5>
            </div>
            <div class="modal-body text-center p-lg">
            <p>Anda Yakin Akan Submit Tracer ?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
            <button type="button" class="md-btn md-raised p-x-md indigo" data-dismiss="modal">Yes</button>
            </div>
        </div><!-- /.modal-content -->
        </div>
    </div>
  <!-- / .modal -->
@endsection
<style>
    .error-show {
        display: block;
        color: red;
    }
</style>
