@extends('layouts.user_admin')
@section('judul', 'Kelola Tracer')
@section('konten')


    {{-- @include('admin.sidebar') --}}
    <div class="modal fade" id="questionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionModalLabel">Edit Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>
                        <label class="md-check" id="statusQuestion">
                            <input type="checkbox" class="has-value" onclick="updateStatusText()">
                            <i class="indigo"></i>
                            <span></span>
                        </label>
                    </p>
                    <!-- Form pertanyaan akan ditampilkan di sini -->
                    <form id="modalQuestionForm">
                        <div class="form-group">
                            <label for="modalQuestionInput">Pertanyaan: </label>

                            <input type="text" class="form-control" id="modalQuestionInput" name="modalQuestionInput">
                        </div>
                        <div id="optionsContainer">
                            <!-- Dynamic input elements for options will be added here -->
                        </div>
                    </form>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="hapus()">Delete</button>
                    <button type="button" class="btn btn-primary" onclick="saveModalQuestion()" ui-toggle-class="fade-left"
                        ui-target="#animate">Update</button>

                </div>
            </div>
        </div>
    </div>

    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Tracer Create</h2>
                <small>Tracer Studi Pertanyaan</small>
            </div>
            <div class="box-body">
                <div class="ml-3">
                    <table class="table row form-input" data-target="tracerCheckbox">
                        <thead class="thead-lightform-group">
                            <tr class="text-center align-items-center">
                                <th class="col-7">MENURUT ANDA SEBERAPA BESAR PENEKANAN PADA METODE PEMBELAJARAN DI BAWAH
                                    INI
                                    DILAKSANAKAN DI PROGRAM STUDI ANDA?</th>
                                <th>TIDAK SAMA SEKALI</th>
                                <th>KURANG</th>
                                <th>CUKUP BESAR</th>
                                <th>BESAR</th>
                                <th>SANGAT BESAR</th>
                            </tr>
                        </thead>
                        <span class="error-message" id="error-radioGroup2" style="display: none; color: red;">Pilih salah
                            satu
                            opsi</span>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($tracer as $data)
                                @if (empty(json_decode($data['opsi'])))
                                    <tr>
                                        <td class="col-12">
                                            <span id="error-{{ $data['id'] }}"
                                                style="display: none;color:red; font-size:12px" class="error">Belum
                                                Terisi</span>

                                            <label
                                                onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                                style="font-weight: 600">{{ $data['pertanyaan'] }}
                                                @if ($data['status'] == 'none')
                                                    <p style="font-size: 10px; color:red">
                                                        Disabled
                                                    </p>
                                                @else
                                                    <p style="font-size: 10px; color:green">
                                                        {{ $data['status'] }}
                                                    </p>
                                                @endif
                                            </label>

                                            <div class="form-group row form-input" data-target="tracerCheckbox">
                                                <input type="text" name="{{ $data['id'] }}"
                                                    class="additional-input3 form-control" id="{{ $data['id'] }}"
                                                    onchange="handleInputChange(this)">
                                            </div>
                                        </td>
                                    </tr>
                                @elseif ($data['opsi'] === '["SANGAT BESAR","BESAR","CUKUP BESAR","KURANG","TIDAK SAMA SEKALI"]')
                                    <tr>

                                        <td onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                            class="col-12 text-lowercase">
                                            <span id="error-{{ $data['id'] }}"
                                                style="display: none;color:red; font-size:12px" class="error">Belum
                                                Terisi</span>
                                            {{ $data['pertanyaan'] }}
                                            @if ($data['status'] == 'none')
                                                <p style="font-size: 10px; color:red">
                                                    Disabled
                                                </p>
                                            @else
                                                <p style="font-size: 10px; color:green">
                                                    {{ $data['status'] }}
                                                </p>
                                            @endif
                                        </td>
                                        @foreach (json_decode($data['opsi']) as $opsi)
                                            <td class="" style="padding-right: 40px">

                                                <label class="md-check">

                                                    <input type="radio" name="{{ $data['id'] }}"
                                                        value="{{ $opsi }}" class=""
                                                        onclick="handleRadioClick(this)">
                                                    <i class="blue"></i>
                                                </label>
                                            </td>
                                        @endforeach
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <div class="option form-input " data-target="tracerCheckbox">
                                                <div id="error-{{ $data['id'] }}"
                                                    style="display: none;color:red; font-size:12px" class="error">Belum
                                                    terisi</div>

                                                <h6 onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                                    class="font-weight-bold">{{ $data['pertanyaan'] }}</h6>
                                                @if ($data['status'] == 'none')
                                                    <p style="font-size: 10px; color:red">
                                                        Disabled
                                                    </p>
                                                @else
                                                    <p style="font-size: 10px; color:green">
                                                        {{ $data['status'] }}
                                                    </p>
                                                @endif
                                                {{-- <br> --}}

                                                @foreach (json_decode($data['opsi']) as $opsi)
                                                    <div class="form-group row pl-3">
                                                        <label class="md-check text-lowercase">
                                                            <input type="radio" name="{{ $data['id'] }}"
                                                                value="{{ $opsi }}"
                                                                onclick="handleRadioClick(this)">

                                                            <i class="blue"></i>
                                                            {{ $opsi }}

                                                        </label>
                                                    </div>
                                                @endforeach
                                                <input type="text" class="form-control"
                                                    name="{{ $data['id'] }}-text" class="form-control"
                                                    style="display: none;" id="{{ $data['id'] }}-text"
                                                    value="Tulis jika lainnya">


                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-body">

                <div class="m-2 float-right">

                    <button type="button" class="btn btn-primary" onclick="addNewQuestion()">
                        <span><i class="fa fa-plus"></i> </span> Tambah Pertanyaan
                    </button>
                </div>
                <form id="questionForm">
                    <!-- Form pertanyaan dan opsi akan ditambahkan secara dinamis di sini -->
                    <button type="button" id="simpanPertanyaan" class="btn btn-success mt-3"
                        onclick="saveQuestions()">Simpan Semua
                        Pertanyaan</button>
                </form>


            </div>
        </div>
    </div>

@endsection
