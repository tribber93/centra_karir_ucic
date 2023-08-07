let questionsData = [];

let questionCount = 0;
document.addEventListener('DOMContentLoaded', function() {
    const saveBtn = document.getElementById('simpanPertanyaan');
    saveBtn.style.display = 'none';
});
function addNewQuestion() {
    const saveBtn = document.getElementById('simpanPertanyaan');
    saveBtn.style.display = 'block';
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

    const optionCount = optionsContainer.childElementCount / 2 + 1;

    const newOption = document.createElement('input');
    newOption.setAttribute('type', 'text');
    newOption.setAttribute('name', `question${questionNumber}Option${optionCount}`);
    newOption.setAttribute('placeholder', `Pertanyaan ${questionNumber} Opsi ${optionCount}`);
    newOption.setAttribute('class', 'form-control');

    const deleteOptionBtn = document.createElement('button');
    deleteOptionBtn.type = 'button';
    deleteOptionBtn.classList.add('btn', 'btn-danger', 'ml-2');
    deleteOptionBtn.classList = 'Hapus';
    deleteOptionBtn.onclick = () => deleteOption(questionNumber, optionCount);
    optionsContainer.appendChild(newOption);
    optionsContainer.appendChild(deleteOptionBtn);
  }

  function updateOptions(questionNumber) {
    const optionType = document.querySelector(`select[name=optionType${questionNumber}]`).value;
    const optionsContainer = document.getElementById(`optionsContainer${questionNumber}`);
    optionsContainer.innerHTML = '';

    // Update opsi pada pertanyaan sebelumnya (jika ada)
    if (questionNumber > 1) {
      const prevOptionsContainer = document.getElementById(`optionsContainer${questionNumber - 1}`);
      const prevOptionElements = prevOptionsContainer.querySelectorAll('input[type="text"]');
      prevOptionElements.forEach((prevOptionElement) => {
        const newOption = document.createElement('input');
        newOption.setAttribute('type', 'text');
        newOption.setAttribute('name', `question${questionNumber}Option${optionsContainer.childElementCount / 2 + 1}`);
        newOption.setAttribute('placeholder', `Pertanyaan ${questionNumber} Opsi ${optionsContainer.childElementCount / 2 + 1}`);
        newOption.setAttribute('class', 'form-control');
        newOption.value = prevOptionElement.value;
        optionsContainer.appendChild(newOption);

        const deleteOptionBtn = document.createElement('button');
        deleteOptionBtn.type = 'button';
        deleteOptionBtn.classList.add('btn', 'btn-danger', 'ml-2');
        deleteOptionBtn.textContent = 'Hapus';
        deleteOptionBtn.onclick = () => deleteOption(questionNumber, optionsContainer.childElementCount / 2 + 1);
        optionsContainer.appendChild(deleteOptionBtn);
      });
    }
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

    const questionData = {
      question: question,
      optionType: optionType,
      options: options,
    };
    // modals alert
    // $('#m-a-a').modal('show');

    questionsData.push(questionData);

    });
//   });
//   simpan ke database

function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
}
// const jsonData = JSON.stringify(questionsData);


// end
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': getCsrfToken()
    }
});
console.log(questionsData);
// document.getElementById('btnSubmitTracer').addEventListener('click', function () {
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
  const deleteOptionBtn = optionsContainer.querySelector('button.btn-danger');
  optionsContainer.removeChild(option);
  optionsContainer.removeChild(deleteOptionBtn);
}

function deleteQuestion(questionNumber) {
  const questionForm = document.getElementById('questionForm');
  const questionDiv = document.getElementById(`questionForm`).querySelector(`div.form-group:nth-child(${questionNumber})`);
  questionForm.removeChild(questionDiv);
}

// fungsi edit dong
// function showModalQuestionsById(questionId) {
//     $.ajax({
//       url: '/admin/get_question_by_id',
//       type: 'GET',
//       data: { id: questionId },
//       dataType: 'json',
//       success: function (response) {
//         if (response.status === 'success') {
//           // Populate the modal with the question details
//           const questionData = response.data;

//           const modalQuestionForm = document.getElementById('modalQuestionForm');
//           modalQuestionForm.innerHTML = '';

//           const questionDiv = document.createElement('div');
//           questionDiv.classList.add('form-group');

//           const questionLabel = document.createElement('label');
//           questionLabel.textContent = `Pertanyaan ${questionId}:`;
//           questionDiv.appendChild(questionLabel);

//           const questionInput = document.createElement('input');
//           questionInput.type = 'text';
//           questionInput.classList.add('form-control');
//           questionInput.name = `question${questionId}`;
//           questionInput.value = questionData.question;
//           questionDiv.appendChild(questionInput);

//           const optionTypeLabel = document.createElement('label');
//           optionTypeLabel.textContent = 'Jenis Opsi:';
//           questionDiv.appendChild(optionTypeLabel);

//           const optionTypeSelect = document.createElement('select');
//           optionTypeSelect.classList.add('form-control');
//           optionTypeSelect.name = `optionType${questionId}`;
//           optionTypeSelect.onchange = () => updateOptions(questionId);
//           questionDiv.appendChild(optionTypeSelect);

//           const optionTypeRadio = document.createElement('option');
//           optionTypeRadio.value = 'radio';
//           optionTypeRadio.textContent = 'Radio Button';
//           optionTypeSelect.appendChild(optionTypeRadio);

//           const optionTypeSelectOption = document.createElement('option');
//           optionTypeSelectOption.value = 'select';
//           optionTypeSelectOption.textContent = 'Select';
//           optionTypeSelect.appendChild(optionTypeSelectOption);

//           const optionsContainer = document.createElement('div');
//           optionsContainer.id = `optionsContainer${questionId}`;
//           questionDiv.appendChild(optionsContainer);

//           const addOptionBtn = document.createElement('button');
//           addOptionBtn.type = 'button';
//           addOptionBtn.classList.add('btn', 'btn-primary', 'mt-2');
//           addOptionBtn.textContent = 'Tambah Opsi';
//           addOptionBtn.onclick = () => addOption(questionId);
//           questionDiv.appendChild(addOptionBtn);

//           // Tombol Edit
//           const editBtn = document.createElement('button');
//           editBtn.type = 'button';
//           editBtn.classList.add('btn', 'btn-primary', 'ml-2');
//           editBtn.textContent = 'Edit';
//           editBtn.onclick = () => editModalQuestion(questionId);
//           questionDiv.appendChild(editBtn);

//           modalQuestionForm.appendChild(questionDiv);

//           // Isi jenis opsi dan opsi jika ada data pertanyaan
//           optionTypeSelect.value = questionData.optionType;
//           updateOptions(questionId);

//           // Tampilkan modal
//           $('#questionModal').modal('show');
//         } else {
//           // Handle error here if needed
//           console.error('Error fetching question data');
//         }
//       },
//       error: function (xhr, status, error) {
//         // Handle error here if needed
//         console.error('Error fetching question data:', error);
//       }
//     });
//   }

