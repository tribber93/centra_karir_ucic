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

                <div class="m-2 float-right">

                    <button type="button" class="btn btn-primary" onclick="addNewQuestion()">
                        <span><i class="fa fa-plus"></i> </span> Tambah Pertanyaan
                    </button>
                </div>
                <form id="questionForm">
                    <!-- Form pertanyaan dan opsi akan ditambahkan secara dinamis di sini -->
                    <button type="button" style="display: none" id="simpanPertanyaan" class="btn btn-success mt-3"
                        onclick="saveQuestions()">Simpan</button>
                </form>


            </div>
            <div class="box-body">
                <div class="ml-3">
                    <table class="table row form-input" data-target="tracerCheckbox">
                        <thead class="thead-lightform-group">

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
                                            <label class="md-check" id="statusQuestion-{{ $data['id'] }}">
                                                <input type="checkbox" class="has-value"
                                                    onclick="updateStatusCheckbox({{ $data['id'] }})"
                                                    {{ $data['status'] === 'publish' ? 'checked' : '' }}>
                                                <i class="indigo"></i>
                                                <span></span>
                                            </label>


                                            <label
                                                onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                                style="font-weight: 600">{{ $data['pertanyaan'] }}

                                                <span id="statusText-{{ $data['id'] }}"
                                                    style="font-size: 10px; color:{{ $data['status'] === 'publish' ? 'green' : 'red' }}">
                                                    {{ $data['status'] === 'publish' ? '(Publish)' : '(Disabled)' }}
                                                </span>



                                            </label>
                                            <span class="btn btn-success" onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')">Aksi</span>
                                            <div class="form-group r ow form-input" data-target="tracerCheckbox">
                                                {{-- <input type="text" name="{{ $data['id'] }}" --}}
                                                    class="additional-input3 form-control" id="{{ $data['id'] }}"
                                                    onchange="handleInputChange(this)">
                                            </div>
                                        </td>
                                    </tr>
                                @elseif ($data['opsi'] === '["SANGAT BAIK","BESAR","CUKUP BESAR","KURANG","TIDAK SAMA SEKALI"]')
                                    <tr>
                                        <label class="md-check" id="statusQuestion-{{ $data['id'] }}">
                                            <input type="checkbox" class="has-value"
                                                onclick="updateStatusCheckbox({{ $data['id'] }})"
                                                {{ $data['status'] === 'publish' ? 'checked' : '' }}>
                                            <i class="indigo"></i>
                                            <span></span>
                                        </label>

                                        <td onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                            class="col-12 text-lowercase">

                                                <label class="md-check" id="statusQuestion-{{ $data['id'] }}">
                                                    <input type="checkbox" class="has-value"
                                                        onclick="updateStatusCheckbox({{ $data['id'] }})"
                                                        {{ $data['status'] === 'publish' ? 'checked' : '' }}>
                                                    <i class="indigo"></i>
                                                    <span></span>
                                                </label>

                                            {{ Str::ucfirst($data['pertanyaan']) }}


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
                                        <td class="row" colspan="6">
                                            <label class="md-check" id="statusQuestion-{{ $data['id'] }}">
                                                <input type="checkbox" class="has-value"
                                                    onclick="updateStatusCheckbox({{ $data['id'] }})"
                                                    {{ $data['status'] === 'publish' ? 'checked' : '' }}>
                                                <i class="indigo"></i>
                                                <span></span>
                                            </label>
                                            <div class="option form-input " data-target="tracerCheckbox">


                                                <h6 onclick="editQuestion({{ $data['id'] }}, '{{ $data['pertanyaan'] }}', '{{ $data['opsi'] ?? '' }}', '{{ $data['status'] }}')"
                                                    class="font-weight-bold">{{ $data['pertanyaan'] }}</h6>
                                                    <span id="statusText-{{ $data['id'] }}"
                                                    style="font-size: 10px; color:{{ $data['status'] === 'publish' ? 'green' : 'red' }}">
                                                    {{ $data['status'] === 'publish' ? '(Publish)' : '(Disabled)' }}
                                                </span>
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

        </div>
    </div>

    <div class="ml-3">

        <span class="error-message" id="error-radioGroup2" style="display: none; color: red;">Pilih salah satu
            opsi</span>
        <!-- ############ PAGE START-->

        {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}

        <script>
            function updateStatusCheckbox(questionId) {
                const statusCheckbox = $(`#statusQuestion-${questionId} input`);
                const isChecked = statusCheckbox.prop('checked');
                const newStatus = isChecked ? 'publish' : 'none'; // Toggle the status

                // Perform the AJAX request to update the question status
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                console.log(`Checkbox clicked. ID: ${questionId}`);
                console.log(`Checkbox clicked. ID: ${newStatus}`);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '/admin/update_question_status',
                    type: 'POST',
                    data: {
                        id: questionId,
                        status: newStatus
                    },
                    success: function(response) {
                        // Update the checkbox status based on the response
                        statusCheckbox.prop('checked', newStatus === 'publish');
                        const statusText = $(`#statusText-${questionId}`);
                        if (newStatus === 'publish') {
                            statusText.css('color', 'green').text('(Publish)');
                        } else {
                            statusText.css('color', 'red').text('(Disabled)');
                        }
                    },
                    error: function(error) {
                        // Handle errors if necessary
                        console.error(error);
                    }
                });

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
                        const inputElement =
                            `<input type="text" class="form-control" id="${optionId}" name="${optionId}" value="${option}" />`;
                        $('#optionsContainer').append(inputElement);
                    });

                    // Set the status checkbox based on the 'status' value
                    const statusCheckbox = $('#statusQuestion input');
                    statusCheckbox.prop('checked', status !== 'none');

                    // Display "Aktif" or "Status Publish" text depending on the checkbox status
                    const statusText = $('#statusQuestion span');
                    statusText.text(status === 'none' ? 'aktfikan' : 'Aktif');
                    statusCheckbox.on('click', function() {
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
            }
        </script>
    @endsection
