// const checkbox = document.getElementById("tracerCheckbox");
// const formInputs = document.querySelectorAll(".form-input");

// function toggleOtherInput() {
//     var otherRadio = document.getElementById("other");
//     var otherInput = document.getElementById("otherInput");

//     if (!otherRadio.checked) {
//         otherInput.style.display = "none";
//     } else {
//         otherInput.style.display = "";
//     }
// }

// if (!checkbox.checked) {
//     formInputs.forEach((input) => {
//         if (input.dataset.target === "tracerCheckbox") {
//             input.style.display = "none";
//         }
//     });
// }

// checkbox.addEventListener("change", function () {
//     const isChecked = checkbox.checked;
//     formInputs.forEach((input) => {
//         if (input.dataset.target === "tracerCheckbox") {
//             input.style.display = isChecked ? "" : "none";
//         }
//     });
// });


// function handleInputChange(input) {
//     const id = input.id;
//     const value = input.value;
//     let pertanyaan = '';
//     console.log("Kamu memilih id:", id, "value:", value, "pertanyaan:" , pertanyaan);

//     return { id, value, pertanyaan };
// }


// function handleRadioClick(radio) {
//     const id = radio.name;
//     var value = radio.value;
//     var textInput = document.getElementById(`${id}-text`);
//     var pertanyaan = ''; // Initialize pertanyaan as an empty string

//     console.log(id);
//     $.ajax({
//         url: `/alumni/getPertanyaanFromServer?id=${id}`,
//         type: 'GET',
//         dataType: 'json',
//         success: function(response) {
//             // If the request is successful, set the pertanyaan variable
//             pertanyaan = response.pertanyaan; // Assuming the response contains the "pertanyaan" data
//             console.log(pertanyaan);
//             pertanyaan = response.pertanyaan;

//             // Continue with the rest of the logic using the updated pertanyaan value
//             // if (value === 'lainnya') {
//             //     // Jika pilihan "LAINNYA" dipilih, set nilai value ke "0"
//             //     // textInput.value = '0';
//             //     // Tampilkan input type text untuk pilihan "LAINNYA"
//             //     textInput.style.display = 'block';
//             //     value = textInput.value;
//             //     console.log(pertanyaan);
//             // } else {
//             //     textInput.style.display = 'none';
//             // }
//             // You can now use the pertanyaan value here or pass it to another function
//             // Example: processPertanyaan(pertanyaan);

//             // Log the final object with the updated pertanyaan value
//             console.log({ id, value, pertanyaan });
//             return { id, value, pertanyaan };
//         },
//         error: function(error) {
//             console.log('Error fetching pertanyaan:', error);

//             // In case of an error, handle the rest of the logic without the pertanyaan data
//             console.log({ id, value, pertanyaan });
//         }
//     });
//     if (textInput) {
//         if (value === 'lainnya') {
//             // Jika pilihan "LAINNYA" dipilih, set nilai value ke "0"
//             // textInput.value = '0';
//             // Tampilkan input type text untuk pilihan "LAINNYA"
//             textInput.style.display = 'block';
//             value = textInput.value;
//             console.log("as");
//         } else {

//             textInput.style.display = 'none';
//         }
//         return { id, value, pertanyaan }; // Include pertanyaan in the return object
//     }

//     // Fetch "pertanyaan" from the server based on the selected radio button's "id"


//     return { id, value, pertanyaan };
// }

// document.querySelectorAll('input[type="radio"]').forEach(radio => {
//     radio.addEventListener('change', function () {
//         const radioName = this.name;
//         const checkedValue = document.querySelector(`input[name="${radioName}"]:checked`);

//         if (checkedValue === null) {
//             document.getElementById(`error-${radioName}`).style.display = 'block';
//         } else {
//             document.getElementById(`error-${radioName}`).style.display = 'none';
//         }

//     });
// });
// document.getElementById('btnGetData').addEventListener('click', () => {
//     // form bagian atas

//     const isChecked = $('#tracerCheckbox').prop('checked');
//     const namaPerusahaan = $('#namaPerusahaan').val();
//     const posisi = $('#posisi').val();
//     const mulaiBekerja = $('#mulaiBekerja').val();
//     const noTelp = $('#noTelp').val();

//     const formData = {
//         isChecked: isChecked,
//         namaPerusahaan: namaPerusahaan,
//         posisi: posisi,
//         mulaiBekerja: mulaiBekerja,
//         noTelp: noTelp
//     };

//     // end
//     const inputElements = document.querySelectorAll('.additional-input, .additional-input3, #namaPerusahaan, #posisi, #mulaiBekerja');
//     const radioElements = document.querySelectorAll('input[type="radio"]');
//     // const inputIds = ['namaPerusahaan', 'posisi', 'mulaiBekerja'];
//     let outputLog = [];

//     let isInputValid = true;
//     inputElements.forEach(input => {
//         if (input.value.trim() === '') {
//             isInputValid = false;
//             const id = input.id;
//             const errorSpan = document.getElementById(`error-${id}`);
//             // const errorSpanPerusahaan = namaPerusahaan;

//             // errorSpanPerusahaan.display = 'block';
//             errorSpan.style.display = 'block';
//             // errorSpan.innerHTML= '<br>';

//         } else {
//             const id = input.id;
//             const errorSpan = document.getElementById(`error-${id}`);
//             // errorSpan.style.display = 'none';
//         }
//     });



//     // Validasi radio
//     let isRadioValid = true;
//     radioElements.forEach(radio => {
//         const radioName = radio.name;
//         const isChecked = [...document.querySelectorAll(`input[name="${radioName}"]`)]
//             .some(r => r.checked);

//         if (!isChecked) {
//             isRadioValid = false;
//             console.log(`Radio button ${radioName} belum diisi!`);
//             document.getElementById(`error-${radioName}`).style.display = 'block';
//             return false;
//         } else {
//             document.getElementById(`error-${radioName}`).style.display = 'none';
//         }
//     });

//     if (!isRadioValid) {
//         return;
//     }
//     //  modal gaksi
//         if (isInputValid && isRadioValid) {
//             $('#m-a-a').modal('show');
//     } else {
//         // Tampilkan pesan kesalahan jika ada input yang belum valid
//         console.log("Harap lengkapi semua input yang belum terisi!");
//     }

//     inputElements.forEach(input => {
//         const result = handleInputChange(input);
//         outputLog.push(result);
//     });

//     radioElements.forEach(radio => {
//         if (radio.checked) {
//             const result = handleRadioClick(radio);
//             outputLog.push(result);
//         }
//     });
//     function getCsrfToken() {
//         return $('meta[name="csrf-token"]').attr('content');
//     }
//     console.log(formData);
//     console.log(outputLog);

// // ambil token dlu bro
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': getCsrfToken()
//         }
//     });
//     const jsonData = JSON.stringify(outputLog);
//     console.log(`ini output : ${outputLog}`);
//     document.getElementById('btnSubmitTracer').addEventListener('click', function () {
//         $.ajax({
//             url: '/alumni/simpan_tracer',
//             type: 'POST',
//             headers: {
//                 'X-CSRF-Token': getCsrfToken()
//             },
//             data: formData,
//             dataType: 'json',
//             success: function (response) {
//                 if (response.status === 'success') {
//                     console.log('Data berhasil disimpan ke tabel.');

//                     location.reload();
//                 }

//             },

//         });



//                 console.log(jsonData);
//                 console.log(outputLog);
//         const responseData = outputLog;
//         $.ajax({
//             url: '/alumni/simpan' , // Ganti dengan URL tujuan request AJAX Anda

//             type: 'POST',
//             data: jsonData,
//             headers: {
//               'X-CSRF-Token': getCsrfToken()
//           },
//             contentType: 'application/json',
//             success: function (response) {
//               console.log('Data opsi berhasil dikirim ke server.');
//             },
//             error: function (error) {
//               console.log('Terjadi kesalahan saat mengirim data.');
//             }
//           });
//     });

//     console.log(outputLog);
//     // save opsi ya
//     function sendDataToServer(data) {


//       }

// });
function getServerPertanyaan(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/alumni/getPertanyaanFromServer?id=${id}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                resolve(response.pertanyaan);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}

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

async function handleInputChange(input) {
    const id = input.id;
    const value = input.value;
    let pertanyaan = "";
    console.log(id);
    if (id === "posisi" || id === "mulaiBekerja" || id === "namaPerusahaan") {
        const errorSpan = document.getElementById(`error-${id}`);
            console.log(`ini ${pertanyaan}`);
            pertanyaan = id;
            errorSpan.style.display = 'none';

    }
    else {
        // Jika nilai input tidak kosong, sembunyikan pesan error (jika ada)
    const pertanyaan1 = await getServerPertanyaan(id);

        const errorSpan = document.getElementById(`error-${id}`);
        console.log(`ini ${pertanyaan}`);
        pertanyaan = pertanyaan1;


        errorSpan.style.display = 'none';
    }
     if (id === "tracerCheckbox") {
        const isChecked = input.checked;
        if (!isChecked) {
            // Jika checkbox tidak dicek, tampilkan pesan error
            const errorSpan = document.getElementById(`error-${id}`);
            // pertanyaan = id;

            errorSpan.style.display = 'block';
        } else {
            // Jika checkbox dicek, sembunyikan pesan error (jika ada)
            pertanyaan = value;
            const errorSpan = document.getElementById(`error-${id}`);

            // errorSpan.style.display = 'none';
        }
    }
    console.log("Kamu memilih id:", id, "value:", value, "pertanyaan:", pertanyaan);
    return { id, value, pertanyaan };

}

async function handleRadioClick(radio) {
    const id = radio.name;
    var value = radio.value;
    var textInput = document.getElementById(`${id}-text`);

    try {
        const pertanyaan = await getServerPertanyaan(id);
        console.log(pertanyaan);

        if (textInput) {
            if (value === 'lainnya') {
                textInput.style.display = 'block';
                value = textInput.value;
                console.log("as");
            } else {
                textInput.style.display = 'none';
            }
        }

        return { id, value, pertanyaan };
    } catch (error) {
        console.log('Error fetching pertanyaan:', error);

        // In case of an error, handle the rest of the logic without the pertanyaan data
        return { id, value, pertanyaan: '' };
    }
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

document.getElementById('btnGetData').addEventListener('click', async () => {
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
    let outputLog = [];

    let isInputValid = true;
    inputElements.forEach(input => {
        if (input.value.trim() === '') {
            isInputValid = false;
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            errorSpan.style.display = 'block';
        } else {
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            // errorSpan.style.display = 'none';
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

    if (isInputValid && isRadioValid) {
        $('#m-a-a').modal('show');
    } else {
        console.log("Harap lengkapi semua input yang belum terisi!");
    }

    for (const input of inputElements) {
        const result = await handleInputChange(input);
        outputLog.push(result);
    }

    for (const radio of radioElements) {
        if (radio.checked) {
            const result = await handleRadioClick(radio);
            outputLog.push(result);
        }
    }

    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    console.log(formData);
    console.log(outputLog);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });

    const jsonData = JSON.stringify(outputLog);
    console.log(`ini output : ${outputLog}`);

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

        $.ajax({
            url: '/alumni/simpan',
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

    function sendDataToServer(data) {

    }
});
