@extends('layouts.user_admin')
@section('judul', 'Admin Dashboard')
@section('konten')

    {{-- <div class="padding">
        <div class="box p-4">
            <h4>Kelola Tracer</h4>
            <div class="container mt-5">
                <form id="dynamicForm">
                    <div id="questionsContainer">
                        <!-- Container for dynamic questions -->
                    </div>
                    <button type="button" class="btn btn-primary" id="addQuestionBtn">Tambah Pertanyaan</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var questionCount = 0;

        function addQuestion() {
            var questionsContainer = document.getElementById('questionsContainer');
            var questionDiv = document.createElement('div');
            questionDiv.className = 'mb-4';

            var questionInput = document.createElement('input');
            questionInput.type = 'text';
            questionInput.className = 'form-control';
            questionInput.name = 'questions[' + questionCount + '][text]';
            questionInput.placeholder = 'Pertanyaan';
            questionInput.required = true;

            var typeSelect = document.createElement('select');
            typeSelect.className = 'form-control';
            typeSelect.name = 'questions[' + questionCount + '][type]';
            typeSelect.required = true;

            var types = ['text', 'dropdown', 'checkbox', 'radio', 'skala_tabel'];
            for (var i = 0; i < types.length; i++) {
                var option = document.createElement('option');
                option.value = types[i];
                option.textContent = types[i];
                typeSelect.appendChild(option);
            }

            typeSelect.addEventListener('change', function() {
                var selectedType = this.value;
                var addOptionBtn = questionDiv.querySelector('.add-option-btn');

                if (selectedType === 'skala_tabel' || selectedType === 'text') {
                    if (addOptionBtn) {
                        addOptionBtn.style.display = 'none';
                    }
                } else {
                    if (addOptionBtn) {
                        addOptionBtn.style.display = 'block';
                    }
                }
            });

            var addOptionBtn = document.createElement('button');
            addOptionBtn.type = 'button';
            addOptionBtn.className = 'btn btn-secondary add-option-btn';
            addOptionBtn.textContent = 'Tambah Opsi';
            addOptionBtn.style.display = 'none';
            addOptionBtn.addEventListener('click', function() {
                addOption(this);
            });

            questionDiv.appendChild(questionInput);
            questionDiv.appendChild(typeSelect);
            questionDiv.appendChild(addOptionBtn);

            questionsContainer.appendChild(questionDiv);

            questionCount++;
        }

        function addOption(button) {
            var optionsContainer = document.createElement('div');
            optionsContainer.className = 'mt-3';

            var optionInput = document.createElement('input');
            optionInput.type = 'text';
            optionInput.className = 'form-control';
            optionInput.name = 'questions[' + questionCount + '][options][]';
            optionInput.placeholder = 'Opsi';
            optionInput.required = true;

            var removeOptionBtn = document.createElement('button');
            removeOptionBtn.type = 'button';
            removeOptionBtn.className = 'btn btn-sm btn-danger mt-2';
            removeOptionBtn.textContent = 'Hapus Opsi';
            removeOptionBtn.addEventListener('click', function() {
                optionsContainer.removeChild(optionInput);
                optionsContainer.removeChild(removeOptionBtn);
            });

            optionsContainer.appendChild(optionInput);
            optionsContainer.appendChild(removeOptionBtn);

            button.parentElement.appendChild(optionsContainer);
        }

        document.getElementById('addQuestionBtn').addEventListener('click', function() {
            addQuestion();
        });
    </script> --}}

    <div class="padding">
        <div class="box p-4">
            <h4>Kelola Tracer</h4>
            <div class="container mt-5">
                <form id="dynamicForm">
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" class="form-control" id="question" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="text">Text</option>
                            <option value="dropdown">Dropdown</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="radio">Radio Button</option>
                            <option value="skala_tabel">Skala Tabel</option>
                        </select>
                    </div>
                    <div class="form-group" id="optionsContainer">
                        <!-- Container for dynamic options -->
                    </div>
                    <button type="button" class="btn btn-primary" style="display: none" id="addOptionBtn">Tambah
                        Opsi</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        // Function to add a new option field
        function addOption() {
            var optionsContainer = document.getElementById('optionsContainer');
            var optionInput = document.createElement('input');
            optionInput.setAttribute('type', 'text');
            optionInput.setAttribute('class', 'form-control');
            optionInput.setAttribute('name', 'options[]');
            optionInput.setAttribute('required', true);

            var optionDiv = document.createElement('div');
            optionDiv.setAttribute('class', 'form-group');
            optionDiv.appendChild(optionInput);

            optionsContainer.appendChild(optionDiv);
        }

        // Add event listener to the "type" select element
        document.getElementById('type').addEventListener('change', function() {
            var type = this.value;
            var optionsContainer = document.getElementById('optionsContainer');
            var addOptionBtn = document.getElementById('addOptionBtn'); // Get the "Tambah Opsi" button element

            optionsContainer.innerHTML = ''; // Clear previous options

            if (type === 'dropdown' || type === 'checkbox' || type === 'radio' || type === 'skala_tabel') {
                addOptionBtn.style.display = ''; // Show the "Tambah Opsi" button
            } else {
                addOptionBtn.style.display = 'none'; // Hide the "Tambah Opsi" button
            }
        });

        // Add event listener to the "Tambah Opsi" button
        document.getElementById('addOptionBtn').addEventListener('click', function() {
            addOption();
        });
    </script>

@endsection
