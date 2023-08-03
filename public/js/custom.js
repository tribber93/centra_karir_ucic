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
    var textInput = document.getElementById(`${id}-text`);

    if (textInput) {
        if (value === 'LAINNYA') {
            // Jika pilihan "LAINNYA" dipilih, set nilai value ke "0"
            // textInput.value = '0';
            // Tampilkan input type text untuk pilihan "LAINNYA"
            textInput.style.display = 'block';
            value = textInput.value;
            console.log("as");
        } else {
            textInput.style.display = 'none';
        }
        return { id, value };
    }
    return { id, value };
}

document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const radioName = this.name;
        const checkedValue = document.querySelector(`input[name="${radioName}"]:checked`);

        if (checkedValue === null) {
            document.getElementById(`error-${radioName}`).style.display = 'block';
        } else {
            document.getElementById(`error-${radioName}`).style.display = 'none';
        }

    });
});
document.getElementById('btnGetData').addEventListener('click', () => {
    // form bagian atas

    const isChecked = $('#tracerCheckbox').prop('checked');
    const namaPerusahaan = $('#namaPerusahaan').val();
    const posisi = $('#posisi').val();
    const mulaiBekerja = $('#mulaiBekerja').val();
    const noTelp = $('#noTelp').val();

    const formData = {
        isChecked: isChecked,
        namaPerusahaan: namaPerusahaan,
        posisi: posisi,
        mulaiBekerja: mulaiBekerja,
        noTelp: noTelp
    };

    // end
    const inputElements = document.querySelectorAll('.additional-input, .additional-input3, #namaPerusahaan, #posisi, #mulaiBekerja');
    const radioElements = document.querySelectorAll('input[type="radio"]');
    // const inputIds = ['namaPerusahaan', 'posisi', 'mulaiBekerja'];
    let outputLog = [];

    let isInputValid = true;
    inputElements.forEach(input => {
        if (input.value.trim() === '') {
            isInputValid = false;
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            // const errorSpanPerusahaan = namaPerusahaan;

            // errorSpanPerusahaan.display = 'block';
            errorSpan.style.display = 'block';
            // errorSpan.innerHTML= '<br>';

        } else {
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            errorSpan.style.display = 'none';
        }
    });



    // Validasi radio
    let isRadioValid = true;
    radioElements.forEach(radio => {
        const radioName = radio.name;
        const isChecked = [...document.querySelectorAll(`input[name="${radioName}"]`)]
            .some(r => r.checked);

        if (!isChecked) {
            isRadioValid = false;
            console.log(`Radio button ${radioName} belum diisi!`);
            document.getElementById(`error-${radioName}`).style.display = 'block';
            return false;
        } else {
            document.getElementById(`error-${radioName}`).style.display = 'none';
        }
    });

    if (!isRadioValid) {
        return;
    }
    //  modal gaksi
        if (isInputValid && isRadioValid) {
            $('#m-a-a').modal('show');
    } else {
        // Tampilkan pesan kesalahan jika ada input yang belum valid
        console.log("Harap lengkapi semua input yang belum terisi!");
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
    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }
    console.log(formData);
    console.log(outputLog);

// ambil token dlu bro
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    const jsonData = JSON.stringify(outputLog);
    document.getElementById('btnSubmitTracer').addEventListener('click', function () {
        $.ajax({
            url: '/alumni/simpan_tracer',
            type: 'POST',
            headers: {
                'X-CSRF-Token': getCsrfToken()
            },
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    console.log('Data berhasil disimpan ke tabel.');

                    location.reload();
                }

            },

        });



                console.log(jsonData);
                console.log(outputLog);
        const responseData = outputLog;
        $.ajax({
            url: '/alumni/simpan' , // Ganti dengan URL tujuan request AJAX Anda

            type: 'POST',
            data: jsonData,
            headers: {
              'X-CSRF-Token': getCsrfToken()
          },
            contentType: 'application/json',
            success: function (response) {
              console.log('Data opsi berhasil dikirim ke server.');
            },
            error: function (error) {
              console.log('Terjadi kesalahan saat mengirim data.');
            }
          });
    });

    console.log(outputLog);
    // save opsi ya
    function sendDataToServer(data) {


      }

});


