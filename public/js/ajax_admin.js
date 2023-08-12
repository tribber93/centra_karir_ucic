let questionsData = [];
let questionCount = 0;
document.addEventListener('DOMContentLoaded', function() {
    const questionForms = document.getElementById('questionForm').querySelectorAll('.form-group');
    const saveBtn = document.getElementById('ptn');

    if (saveBtn.length === 1) {
        saveBtn.style.display = 'none';
    } else {
        saveBtn.style.display = 'block';
    }
});
function addNewQuestion() {
    $('#simpanPertanyaan').show();
    const questionForms = document.getElementById('questionForm').querySelectorAll('.form-group');
    if (questionForms.length > 0  && questionForms.length == 1 ) {
        alert('Anda hanya dapat menambah satu pertanyaan.');

        return;
    }
    const saveBtn = document.getElementById('ptn');
    // saveBtn.style.display = 'none';

    questionCount++;
    const questionForm = document.getElementById('questionForm');

    const questionDiv = document.createElement('div');
    questionDiv.classList.add('form-group');

    const questionLabel = document.createElement('label');
    questionLabel.textContent = `Pertanyaan ${questionCount}:`;
    questionDiv.appendChild(questionLabel);

    const questionInput = document.createElement('input');
    questionInput.type = 'text';
    questionInput.classList.add('form-control');
    questionInput.name = `question${questionCount}`;
    questionDiv.appendChild(questionInput);

    const optionTypeLabel = document.createElement('label');
    optionTypeLabel.textContent = 'Jenis Opsi:';
    questionDiv.appendChild(optionTypeLabel);

    const optionTypeSelect = document.createElement('select');
    optionTypeSelect.classList.add('form-control');
    optionTypeSelect.name = `optionType${questionCount}`;
    optionTypeSelect.onchange = () => updateOptions(questionCount);
    questionDiv.appendChild(optionTypeSelect);

    const optionTypeRadio = document.createElement('option');
    optionTypeRadio.value = 'radio';
    optionTypeRadio.textContent = 'Radio Button';
    optionTypeSelect.appendChild(optionTypeRadio);

    const optionTypeSelectOption = document.createElement('option');
    optionTypeSelectOption.value = 'text';
    optionTypeSelectOption.textContent = 'text';
    optionTypeSelect.appendChild(optionTypeSelectOption);

    const optionsContainer = document.createElement('div');
    optionsContainer.id = `optionsContainer${questionCount}`;
    questionDiv.appendChild(optionsContainer);

    const addOptionBtn = document.createElement('button');
    addOptionBtn.type = 'button';
    addOptionBtn.classList.add('btn', 'btn-primary', 'mt-2');
    addOptionBtn.textContent = 'Tambah Opsi';
    addOptionBtn.onclick = () => addOption(questionCount);
    questionDiv.appendChild(addOptionBtn);

    questionForm.appendChild(questionDiv);
}

function addOption(questionNumber) {
    const optionsContainer = document.getElementById(`optionsContainer${questionNumber}`);
    const optionType = document.querySelector(`select[name=optionType${questionNumber}]`).value;

    if (optionType === 'radio') {
        const optionCount = optionsContainer.childElementCount / 2 + 1;

        const newOption = document.createElement('input');
        newOption.setAttribute('type', 'text');
        newOption.setAttribute('name', `question${questionNumber}Option${optionCount}`);
        newOption.setAttribute('placeholder', `Pertanyaan ${questionNumber} Opsi ${optionCount}`);
        newOption.setAttribute('class', 'form-control');

        const deleteOptionBtn = document.createElement('button');
        deleteOptionBtn.type = 'button';
        deleteOptionBtn.classList.add('btn', 'btn-danger', 'ml-2');
        deleteOptionBtn.textContent = 'Hapus';
        deleteOptionBtn.setAttribute('data-option', optionCount); // Tambahkan atribut data-option
        deleteOptionBtn.onclick = () => deleteOption(questionNumber, optionCount);
        optionsContainer.appendChild(newOption);
        optionsContainer.appendChild(deleteOptionBtn);
    }
}

function updateOptions(questionNumber) {
    const optionType = document.querySelector(`select[name=optionType${questionNumber}]`).value;
    const optionsContainer = document.getElementById(`optionsContainer${questionNumber}`);
    optionsContainer.innerHTML = '';

    if (optionType === 'radio') {
        const optionCount = optionsContainer.childElementCount / 2 + 1;

        const newOption = document.createElement('input');
        newOption.setAttribute('type', 'text');
        newOption.setAttribute('name', `question${questionNumber}Option${optionCount}`);
        newOption.setAttribute('placeholder', `Pertanyaan ${questionNumber} Opsi ${optionCount}`);
        newOption.setAttribute('class', 'form-control');

        const deleteOptionBtn = document.createElement('button');
        deleteOptionBtn.type = 'button';
        deleteOptionBtn.classList.add('btn', 'btn-danger', 'ml-2');
        deleteOptionBtn.textContent = 'Hapus';
        deleteOptionBtn.onclick = () => deleteOption(questionNumber, optionCount);
        optionsContainer.appendChild(newOption);
        optionsContainer.appendChild(deleteOptionBtn);
    }
}
function toTitleCase(str) {
    const words = str.split(' ');

    for (let i = 0; i < words.length; i++) {
      const word = words[i];
      words[i] = word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }

    return words.join(' ');
  }
function saveQuestions() {
  questionsData = [];

  const questionForms = document.getElementById('questionForm').querySelectorAll('.form-group');
  questionForms.forEach((questionForm) => {
    const questionInput = questionForm.querySelector('input[type="text"]');
    const optionTypeSelect = questionForm.querySelector('select');
    const optionsContainer = questionForm.querySelector('div[id^="optionsContainer"]');

    const question = questionInput.value;
    const optionType = optionTypeSelect.value;
    const options = [];

    const optionElements = optionsContainer.querySelectorAll('input[type="text"]');
    optionElements.forEach((optionElement) => {
      options.push(optionElement.value);
    });
    const titleCaseOptions = options.map((option) => toTitleCase(option));
    const questionData = {
      question: question,
      optionType: optionType,
      options: titleCaseOptions,
    };

    questionsData.push(questionData);

    });

function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
}


// end
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': getCsrfToken()
    }
});
console.log(questionsData);
    $.ajax({
        url: '/admin/kelola_tracer',
        type: 'POST',
        headers: {
            'X-CSRF-Token': getCsrfToken()
        },
        data:  { questionsData: questionsData },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                console.log('Data berhasil disimpan ke tabel.');

                location.reload();
            }

        },

    });
  console.log('Data Pertanyaan:', questionsData);
}

function deleteOption(questionNumber, optionCount) {
    const optionsContainer = document.getElementById(`optionsContainer${questionNumber}`);
    const option = optionsContainer.querySelector(`input[name="question${questionNumber}Option${optionCount}"]`);
    const deleteOptionBtn = optionsContainer.querySelector(`button[data-option="${optionCount}"]`); // Menggunakan atribut data-option
    optionsContainer.removeChild(option);
    optionsContainer.removeChild(deleteOptionBtn);
  }

function deleteQuestion(questionNumber) {
  const questionForm = document.getElementById('questionForm');
  const questionDiv = document.getElementById(`questionForm`).querySelector(`div.form-group:nth-child(${questionNumber})`);
  questionForm.removeChild(questionDiv);
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': getCsrfToken()
    }
});
function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
}
function getCountData() {
    $.ajax({
        type: 'GET',
        url: '/admin/getCountData',
        dataType: 'json',
        data: { 'data': 'ok' },
        headers: {
            'X-CSRF-Token': getCsrfToken()
        },
        success: function (response) {
            if (response.status === 'OK') {

                $('#pp').html(`Fungsi ini dilakukan untuk memback-up data tracer alumni yang sudah >3 bulan dan terdapat <strong>${response.data.count} data</strong>`);

                $('#m-a-f').modal('show');

                console.log(response.data.count);

                console.log(response.status);
            }
        },
        error: function (xhr, status, error) {
            alert('An error occurred during the backup process.');
        }
    });
}
$(document).ready(function () {
    $('.btn-backup').on('click', function () {
        $.ajax({
            type: 'GET',
            url: '/admin/backup',
            dataType: 'json',
            data:{'data' : "ok"},
            headers: {
                'X-CSRF-Token': getCsrfToken()
            },
            success: function (response) {

                if (response.status === 'OK') {
                    $('#m-a-G').modal('show');
                    $('#backupCount').text(response.data.count);
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                    console.log(response.status);
                location.reload();

                }
            },
            error: function (xhr, status, error) {
                alert('An error occurred during the backup process.');
            }
        });
    });
});

