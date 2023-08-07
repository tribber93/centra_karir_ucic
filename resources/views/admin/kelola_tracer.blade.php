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
</div>

<!-- ############ PAGE START-->
<div class="padding">
    <div class="box">
        <div class="box-header">
            <h2>Tracer Create</h2>
            <small>Tracer Studi Pertanyaan</small>
        </div>
        <div class="box-body">

            {{-- <div class="m-2 float-right">

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


        </div> --}}
        {{-- table--}}



        {{-- a --}}
        <div class="ml-3">
            {{-- <table class="table row form-input" data-target="tracerCheckbox">
                <thead class="thead-lightform-group">
                    <tr class="text-center align-items-center">
                        <th class="col-7">MENURUT ANDA SEBERAPA BESAR PENEKANAN PADA METODE PEMBELAJARAN DI BAWAH INI
                            DILAKSANAKAN DI PROGRAM STUDI ANDA?</th>
                        <th>TIDAK SAMA SEKALI</th>
                        <th>KURANG</th>
                        <th>CUKUP BESAR</th>
                        <th>BESAR</th>
                        <th>SANGAT BESAR</th>
                    </tr>
                </thead> --}}
                <span class="error-message" id="error-radioGroup2" style="display: none; color: red;">Pilih salah satu
                    opsi</span>

                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($tracer as $data)
                    @if (empty(json_decode($data['opsi'])))
                    <tr>
                        <td class="col-12">
                            <span id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"
                                class="error">Belum Terisi</span>

                            <label
                                onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{$data['status']}}')"
                                style="font-weight: 600">{{$data['pertanyaan']}}
                                @if($data['status'] == 'none')
                                <p style="font-size: 10px; color:red">
                                    Disabled
                                </p>
                                      @else
                                      <p style="font-size: 10px; color:green">
                                        {{$data['status']}}
                                    </p>

                                    @endif
                              </label>

                            <div class="form-group row form-input" data-target="tracerCheckbox">
                                <input type="text" name="{{ $data['id'] }}" class="additional-input3 form-control"
                                    id="{{ $data['id'] }}" onchange="handleInputChange(this)">
                            </div>
                        </td>
                    </tr>
                    @elseif ($data['opsi'] === '["SANGAT BESAR","BESAR","CUKUP BESAR","KURANG","TIDAK SAMA SEKALI"]')
                    <tr>

                        <td onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{$data['status']}}')"
                            class="col-12 text-lowercase">
                            <span id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"
                                class="error">Belum Terisi</span>
                            {{ $data['pertanyaan'] }}
                            @if($data['status'] == 'none')
                            <p style="font-size: 10px; color:red">
                                Disabled
                            </p>
                                  @else
                                  <p style="font-size: 10px; color:green">
                                    {{$data['status']}}
                                </p>

                                @endif
                        </td>
                        @foreach (json_decode($data['opsi']) as $opsi)

                        <td class="" style="padding-right: 40px">

                            <label class="md-check">

                                <input type="radio" name="{{ $data['id'] }}" value="{{ $opsi }}" class=""
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
                                <div id="error-{{ $data['id'] }}" style="display: none;color:red; font-size:12px"
                                    class="error">Belum terisi</div>

                                <h6 onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{$data['status']}}')"
                                    class="font-weight-bold">{{ $data['pertanyaan'] }}</h6>
                                    @if($data['status'] == 'none')
                                    <p style="font-size: 10px; color:red">
                                        Disabled
                                    </p>
                                          @else
                                          <p style="font-size: 10px; color:green">
                                            {{$data['status']}}
                                        </p>

                                        @endif
                                {{-- <br> --}}

                                @foreach (json_decode($data['opsi']) as $opsi)
                                <div class="form-group row pl-3">
                                    <label class="md-check text-lowercase">
                                        <input type="radio" name="{{ $data['id'] }}" value="{{ $opsi }}"
                                            onclick="handleRadioClick(this)">

                                        <i class="blue"></i>
                                        {{ $opsi }}

                                    </label>
                                </div>


                                @endforeach
                                <input type="text" class="form-control" name="{{ $data['id'] }}-text"
                                    class="form-control" style="display: none;" id="{{$data['id']}}-text"
                                    value="Tulis jika lainnya">


                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-body">

            <div class="m-2 float-right">

                <button type="button" id="ptn" style="display: none" class="btn btn-primary" onclick="addNewQuestion()">
                    <span style="display: none"><i class="fa fa-plus"></i> </span> Tambah Pertanyaan
                </button>
            </div>
            <form id="questionForm">
                <!-- Form pertanyaan dan opsi akan ditambahkan secara dinamis di sini -->
                <button type="button" id="simpanPertanyaan" class="btn btn-success mt-3"
                    onclick="saveQuestions()">Simpan Semua
                    Pertanyaan</button>
            </form>


        </div>

        <script>
             function hapus() {
        const questionId = $('#questionModal .btn-primary').attr('data-question-id');

        function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
}
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                });

                $.ajax({
                    url: `/admin/delete_question/${questionId}`, // Replace with the actual endpoint to delete the question on the server
                    type: 'GET', // Use the appropriate HTTP method (DELETE) to delete the question
                    success: function(response) {
                        // If the deletion is successful, hide the modal and refresh the page
                        $('#questionModal').modal('hide');
                        location.reload();
                    },
                    error: function(error) {
                        // Handle errors if necessary
                        console.error(error);
                    },
                });
    }
             function editQuestion(id, pertanyaan, opsi, status) {
        $('#modalQuestionInput').val(pertanyaan);

        // Parse the options from the string
        const optionsArray = JSON.parse(opsi);

        // Clear any existing input elements
        $('#optionsContainer').empty();

        // Create input elements for each option
        optionsArray.forEach((option, index) => {
            const optionId = `option-${index}`;
            const inputElement = `<input type="text" class="form-control" id="${optionId}" name="${optionId}" value="${option}" />`;
            $('#optionsContainer').append(inputElement);
        });

        // Set the status checkbox based on the 'status' value
        const statusCheckbox = $('#statusQuestion input');
        statusCheckbox.prop('checked', status !== 'none');

        // Display "Aktif" or "Status Publish" text depending on the checkbox status
        const statusText = $('#statusQuestion span');
        statusText.text(status === 'none' ? 'aktfikan' : 'Aktif');
        statusCheckbox.on('click', function () {
            const isChecked = $(this).prop('checked');
            const newText = isChecked ? 'Aktif' : 'tracer Diasbeld';
            statusText.text(newText);
        });
        $('#questionModal').modal('show');

        // Save the question ID in a data attribute of the modal Save button
        $('#questionModal .btn-primary').attr('data-question-id', id);
    }
            // Function to save the edited question
            function saveModalQuestion() {
              const questionId = $('#questionModal .btn-primary').attr('data-question-id');
              const editedQuestion = $('#modalQuestionInput').val();

              // Perform the necessary action to save the edited question (e.g., using AJAX to update the database)
              // For demonstration purposes, I'll just update the question text in the table directly.
              $(`#pertanyaan-${questionId}`).text(editedQuestion);

              $('#questionModal').modal('hide');
            }

            // update

            function saveModalQuestion() {
        const questionId = $('#questionModal .btn-primary').attr('data-question-id');
        const editedQuestion = $('#modalQuestionInput').val();
        const editedOptions = [];
        const statusCheckbox = $('#statusQuestion input');
        const status = statusCheckbox.prop('checked') ? 'publish' : 'none'

        // Retrieve the edited options from the input elements
        $('#optionsContainer input').each(function() {
            editedOptions.push($(this).val());
        });

        // Create an object to send as JSON data in the AJAX request
        const updatedData = {
            id: questionId,
            pertanyaan: editedQuestion,
            opsi: JSON.stringify(editedOptions),
            status: status,
        };

        // Perform the AJAX request
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
}
        $.ajax({
            url: '/admin/update_question', // Replace with the actual endpoint to update the question on the server
            type: 'POST', // Use the appropriate HTTP method (POST, PUT, or PATCH) depending on your server implementation
            data: updatedData,
            success: function(response) {
                // Update the table with the new data
                const updatedQuestion = response.pertanyaan;
                $(`#pertanyaan-${questionId}`).text(updatedQuestion);

                // Hide the modal after successful update
                $('#questionModal').modal('hide');
                location.reload();
            },
            error: function(error) {
                // Handle errors if necessary
                console.error(error);
            },
        });

    }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

        @endsection
