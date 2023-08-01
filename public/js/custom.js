const checkbox = document.getElementById("tracerCheckbox");
const formInputs = document.querySelectorAll(".form-input");

function toggleOtherInput() {
    var otherRadio = document.getElementById("other");
    var otherInput = document.getElementById("otherInput");

    if (!otherRadio.checked) {
        otherInput.style.display = "none";
    } else {
        otherInput.style.display = "";
    }
}

if (!checkbox.checked) {
    formInputs.forEach((input) => {
        if (input.dataset.target === "tracerCheckbox") {
            input.style.display = "none";
        }
    });
}

checkbox.addEventListener("change", function () {
    const isChecked = checkbox.checked;
    formInputs.forEach((input) => {
        if (input.dataset.target === "tracerCheckbox") {
            input.style.display = isChecked ? "" : "none";
        }
    });
});


function handleInputChange(input) {
    const id = input.id;
    const value = input.value;
    console.log("Kamu memilih id:", id, "value:", value);

    return { id, value };
}

function handleRadioClick(radio) {
    const id = radio.name;
    var value = radio.value;
    // var lainnya = document.getElementById(`${id}-text`);
    var textInput = document.getElementById(`${id}-text`);

        if (textInput) {
            if (value === 'LAINNYA') {
                // Jika pilihan "LAINNYA" dipilih, set nilai value ke "0"
                // textInput.value = '0';
                // Tampilkan input type text untuk pilihan "LAINNYA"
                textInput.style.display = 'content';
              value =  document.getElementById(`${id}-text`).value;
                console.log("as");

            } else {
                // Jika pilihan lain dipilih, sembunyikan input type text untuk pilihan "LAINNYA"
                textInput.style.display = 'none';
            }
            return { id, value };

        }
        return { id, value };
    // console.log("Kamu memilih id:", id, "value:", value);

}

document.getElementById('btnGetData').addEventListener('click', () => {
    const inputElements = document.querySelectorAll('.additional-input');
    const radioElements = document.querySelectorAll('input[type="radio"]');
    const outputLog = [];

    let isInputValid = true;
    inputElements.forEach(input => {
        if (input.value.trim() === '') {
            isInputValid = false;
            console.log('Isian belum lengkap!');
            return false;
        }
    });

    if (!isInputValid) {

        return;
    }

    // Validasi untuk memastikan semua radio button telah diisi
    let isRadioValid = true;
    radioElements.forEach(radio => {
        const radioName = radio.name;
        const isChecked = [...document.querySelectorAll(`input[name="${radioName}"]`)]
            .some(r => r.checked);

        if (!isChecked) {
            isRadioValid = false;
            console.log(`Radio button ${radioName} belum diisi!`);

            document.getElementById(`error-${radioName}`).classList.add('error-show');
            return false;
        } else {
            document.getElementById(`error-${radioName}`).classList.remove('error-show');
        }
    });

    if (!isRadioValid) {
        return;
    }

    inputElements.forEach(input => {
        const result = handleInputChange(input);
        outputLog.push(result);
    });

    radioElements.forEach(radio => {
        if (radio.checked) {
            const result = handleRadioClick(radio);
            outputLog.push(result);
        }
    });

    console.log(outputLog);
});

$(document).ready(function () {
    // ...

    $('input[type="radio"]').on('change', function () {
        const radioName = $(this).prop('name');
        const isChecked = $(`input[name="${radioName}"]:checked`).val();

        if (isChecked === 'LAINNYA') {
            $(`#${radioName}-text`).show();
        } else {
            $(`#${radioName}-text`).hide();
        }
    });

    // ...
});
