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
                        <input type="text" class="form-control" value="Bambang Hartono" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="2020" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Jenjang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="S1" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="Teknik Informatika" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="20200120093" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="2024" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">No. Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
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
                <div class="table-responsive my-4">
                    <table class="table  row form-input" data-target="tracerCheckbox">
                        <thead class="thead-lightform-group">
                            <tr class="text-center align-items-center">
                                <th class="col-7">MENURUT ANDA SEBERAPA BESAR PENEKANAN PADA METODE PEMBELAJARAN DI BAWAH
                                    INI
                                    DILAKSANAKAN DI
                                    PROGRAM STUDI ANDA?</th>
                                <th>TIDAK SAMA SEKALI</th>
                                <th>KURANG</th>
                                <th>CUKUP BESAR</th>
                                <th>BESAR</th>
                                <th>SANGAT BESAR</th>
                            </tr>
                            <?php 
                    $array = ['Perkuliahan', 'Demonstrasi','Partisipasi dalam Proyek Riset', 'Magang', 'Praktikum','Kerja Lapangan','Diskusi'];
                    for ($i=0; $i < count($array); $i++) { 
                    ?>
                            <tr>
                                <td class="col-6">{{ $array[$i] }}</td>
                                <td class="text-center">
                                    <label class="md-check">
                                        <input type="radio" name="q{{ $i }}" value="1">
                                        <i class="blue"></i>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="md-check">
                                        <input type="radio" name="q{{ $i }}" value="2">
                                        <i class="blue"></i>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="md-check">
                                        <input type="radio" name="q{{ $i }}" value="3">
                                        <i class="blue"></i>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="md-check">
                                        <input type="radio" name="q{{ $i }}" value="4">
                                        <i class="blue"></i>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <label class="md-check">
                                        <input type="radio" name="q{{ $i }}" value="5">
                                        <i class="blue"></i>
                                    </label>
                                </td>
                            </tr>
                            <?php
                    }
                    ?>
                    </table>
                </div>
                <div class="option form-input" data-target="tracerCheckbox">
                    <h6>KAPAN ANDA MULAI MENCARI PEKERJAAN?</h6>
                    <br>
                    <div class="form-group row pl-3">
                        <label class="md-check -">
                            <input type="radio" name="cariKerja">
                            <i class="blue"></i>
                            < 3 BULAN SEBELUM LULUS </label>
                    </div>
                    <div class="form-group row pl-3">
                        <label class="md-check">
                            <input type="radio" name="cariKerja">
                            <i class="blue"></i>
                            > 3 BULAN SESUDAH LULUS </label>
                    </div>
                    <div class="form-group row pl-3">
                        <label class="md-check">
                            <input type="radio" name="cariKerja">
                            <i class="blue"></i>
                            SAYA TIDAK MENCARI PEKERJAAN</label>
                    </div>
                    <div class="form-group row pl-3">
                        <label for="other" class=" md-check">
                            <input type="radio" name="cariKerja" value="other" id="other"
                                onchange="toggleOtherInput()">
                            {{-- <input type="radio" name="cariKerja"> --}}
                            <i class="blue"></i>
                            Lainnya
                        </label><br>

                        <div id="otherInput" style="display: none;">
                            <input class="ml-3" type="text" name="cariKerja">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
