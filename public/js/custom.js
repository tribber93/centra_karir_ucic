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
            type: "GET",
            dataType: "json",
            success: function (response) {
                resolve(response.pertanyaan);
            },
            error: function (error) {
                reject(error);
            },
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
    // if (id === "posisi" || id === "mulaiBekerja" || id === "namaPerusahaan") {
    //     const errorSpan = document.getElementById(`error-${id}`);
    //     console.log(`ini ${pertanyaan}`);
    //     pertanyaan = id;
    //     errorSpan.style.display = "none";
    // }
    // else {
        // Jika nilai input tidak kosong, sembunyikan pesan error (jika ada)
        if(id=="tracerCheckbox") {
            pertanyaan = id.value;
        }
        else{
        const pertanyaan1 = await getServerPertanyaan(id);

        const errorSpan = document.getElementById(`error-${id}`);
        console.log(`ini ${pertanyaan}`);
        pertanyaan = pertanyaan1;

        errorSpan.style.display = "none";
        }
    // }
    // if (id === "tracerCheckbox") {
    //     const isChecked = input.checked;
    //     if (!isChecked) {
    //         // Jika checkbox tidak dicek, tampilkan pesan error
    //         const errorSpan = document.getElementById(`error-${id}`);
    //         pertanyaan = id;

    //         errorSpan.style.display = "block";
    //     } else {
    //         // Jika checkbox dicek, sembunyikan pesan error (jika ada)
    //         pertanyaan = value;
    //         const errorSpan = document.getElementById(`error-${id}`);

    //         // errorSpan.style.display = 'none';
    //     }
    // }
    console.log(
        "Kamu memilih id:",
        id,
        "value:",
        value,
        "pertanyaan:",
        pertanyaan
    );
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
            if (value === "Lainnya") {
                textInput.style.display = "block";
                value = textInput.value;
                console.log("as");
            } else {
                textInput.style.display = "none";
            }
        }

        return { id, value, pertanyaan };
    } catch (error) {
        console.log("Error fetching pertanyaan:", error);

        // In case of an error, handle the rest of the logic without the pertanyaan data
        return { id, value, pertanyaan: "" };
    }
}

document.querySelectorAll('input[type="radio"]').forEach((radio) => {
    radio.addEventListener("change", function () {
        const radioName = this.name;
        const checkedValue = document.querySelector(
            `input[name="${radioName}"]:checked`
        );

        if (checkedValue === null) {
            document.getElementById(`error-${radioName}`).style.display =
                "block";
        } else {
            document.getElementById(`error-${radioName}`).style.display =
                "none";
        }
    });
});

document.getElementById("btnGetData").addEventListener("click", async () => {
    // form bagian atas

    const isChecked = $("#tracerCheckbox").prop("checked");
    const namaPerusahaan = $("#namaPerusahaan").val();
    const posisi = $("#posisi").val();
    const mulaiBekerja = $("#mulaiBekerja").val();
    const noTelp = $("#noTelp").val();

    const formData = {
        isChecked: isChecked,
        namaPerusahaan: namaPerusahaan,
        posisi: posisi,
        mulaiBekerja: mulaiBekerja,
        noTelp: noTelp,
    };

    // end
    const inputElements = document.querySelectorAll(
        ".additional-input, .additional-input3, #namaPerusahaan, #posisi, #mulaiBekerja"
    );
    const radioElements = document.querySelectorAll('input[type="radio"]');
    let outputLog = [];

    let isInputValid = true;
    inputElements.forEach((input) => {
        if (input.value.trim() === "") {
            isInputValid = false;
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            errorSpan.style.display = "block";
        } else {
            const id = input.id;
            const errorSpan = document.getElementById(`error-${id}`);
            // errorSpan.style.display = 'none';
        }
    });

    // Validasi radio
    let isRadioValid = true;
    radioElements.forEach((radio) => {
        const radioName = radio.name;
        const isChecked = [
            ...document.querySelectorAll(`input[name="${radioName}"]`),
        ].some((r) => r.checked);

        if (!isChecked) {
            isRadioValid = false;
            console.log(`Radio button ${radioName} belum diisi!`);
            document.getElementById(`error-${radioName}`).style.display =
                "block";
            return false;
        } else {
            document.getElementById(`error-${radioName}`).style.display =
                "none";
        }
    });

    if (!isRadioValid) {
        return;
    }

    if (isInputValid && isRadioValid) {
        $("#m-a-a").modal("show");
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
        return $('meta[name="csrf-token"]').attr("content");
    }

    console.log(formData);
    console.log(outputLog);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });

    const jsonData = JSON.stringify(outputLog);
    console.log(`ini output : ${outputLog}`);

    document
        .getElementById("btnSubmitTracer")
        .addEventListener("click", function () {
            $.ajax({
                url: "/alumni/simpan_tracer",
                type: "POST",
                headers: {
                    "X-CSRF-Token": getCsrfToken(),
                },
                data: formData,
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        console.log("Data berhasil disimpan ke tabel.");
                        location.reload();
                    }
                },
            });

            console.log(jsonData);
            console.log(outputLog);

            $.ajax({
                url: "/alumni/simpan",
                type: "POST",
                data: jsonData,
                headers: {
                    "X-CSRF-Token": getCsrfToken(),
                },
                contentType: "application/json",
                success: function (response) {
                    console.log("Data opsi berhasil dikirim ke server.");
                },
                error: function (error) {
                    console.log("Terjadi kesalahan saat mengirim data.");
                },
            });
        });

    console.log(outputLog);

    function sendDataToServer(data) {}
});

function hapus() {
    const questionId = $("#questionModal .btn-primary").attr(
        "data-question-id"
    );

    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });

    $.ajax({
        url: `/admin/delete_question/${questionId}`, // Replace with the actual endpoint to delete the question on the server
        type: "GET", // Use the appropriate HTTP method (DELETE) to delete the question
        success: function (response) {
            // If the deletion is successful, hide the modal and refresh the page
            $("#questionModal").modal("hide");
            location.reload();
        },
        error: function (error) {
            // Handle errors if necessary
            console.error(error);
        },
    });
}

function editQuestion(id, pertanyaan, opsi, status) {
    $("#modalQuestionInput").val(pertanyaan);

    // Parse the options from the string
    const optionsArray = JSON.parse(opsi);

    // Clear any existing input elements
    $("#optionsContainer").empty();

    // Create input elements for each option
    optionsArray.forEach((option, index) => {
        const optionId = `option-${index}`;
        const inputElement = `<input type="text" class="form-control" id="${optionId}" name="${optionId}" value="${option}" />`;
        $("#optionsContainer").append(inputElement);
    });

    // Set the status checkbox based on the 'status' value
    const statusCheckbox = $("#statusQuestion input");
    statusCheckbox.prop("checked", status !== "none");

    // Display "Aktif" or "Status Publish" text depending on the checkbox status
    const statusText = $("#statusQuestion span");
    statusText.text(status === "none" ? "aktfikan" : "Aktif");
    statusCheckbox.on("click", function () {
        const isChecked = $(this).prop("checked");
        const newText = isChecked ? "Aktif" : "tracer Diasbeld";
        statusText.text(newText);
    });
    $("#questionModal").modal("show");

    // Save the question ID in a data attribute of the modal Save button
    $("#questionModal .btn-primary").attr("data-question-id", id);
}
// Function to save the edited question
function saveModalQuestion() {
    const questionId = $("#questionModal .btn-primary").attr(
        "data-question-id"
    );
    const editedQuestion = $("#modalQuestionInput").val();

    // Perform the necessary action to save the edited question (e.g., using AJAX to update the database)
    // For demonstration purposes, I'll just update the question text in the table directly.
    $(`#pertanyaan-${questionId}`).text(editedQuestion);

    $("#questionModal").modal("hide");
}

// update

function saveModalQuestion() {
    const questionId = $("#questionModal .btn-primary").attr(
        "data-question-id"
    );
    const editedQuestion = $("#modalQuestionInput").val();
    const editedOptions = [];
    const statusCheckbox = $("#statusQuestion input");
    const status = statusCheckbox.prop("checked") ? "publish" : "none";

    // Retrieve the edited options from the input elements
    $("#optionsContainer input").each(function () {
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
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });

    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr("content");
    }
    $.ajax({
        url: "/admin/update_question", // Replace with the actual endpoint to update the question on the server
        type: "POST", // Use the appropriate HTTP method (POST, PUT, or PATCH) depending on your server implementation
        data: updatedData,
        success: function (response) {
            // Update the table with the new data
            const updatedQuestion = response.pertanyaan;
            $(`#pertanyaan-${questionId}`).text(updatedQuestion);

            // Hide the modal after successful update
            $("#questionModal").modal("hide");
            location.reload();
        },
        error: function (error) {
            // Handle errors if necessary
            console.error(error);
        },
    });
}
