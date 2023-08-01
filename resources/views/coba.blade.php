<!DOCTYPE html>
<html>
<head>
    <title>Nga-jeep</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Menambahkan meta tag CSRF token -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="loadingIndicator" class="text-center mt-3" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <form id="formJawaban" method="POST" action="{{ route('simpan.jawaban') }}">
        @csrf
        <input type="hidden" name="selectedAnswers" id="selectedAnswersInput">
    </form>
    <div class="container">
        <h1 class="mt-5">Daftar Pertanyaan</h1>
        <div id="daftar-pertanyaan">
        </div>
        <div class="mt-3">
            <button id="backButton" class="btn btn-secondary" onclick="loadPreviousQuestion()">Kembali</button>
            <button id="nextButton" class="btn btn-primary" onclick="loadNextQuestion()">Selanjutnya</button>
            <button id="submitButton" class="btn btn-primary" onclick="submitForm()">Submit</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         function showLoadingIndicator() {
        $('#loadingIndicator').show();
    }

    // Fungsi untuk menyembunyikan loading indicator
    function hideLoadingIndicator() {
        $('#loadingIndicator').hide();
    }
        var currentQuestionIndex = 1; // Variabel untuk melacak indeks pertanyaan saat ini
        var selectedAnswers = []; // Array untuk menyimpan jawaban yang dipilih oleh pengguna
        var totalQuestions = 0; // Total jumlah pertanyaan

        $(document).ready(function () {
            $.ajax({
                url: '{{ route("load.questions") }}',
                type: 'GET',
                dataType: 'json',
                success: function (total) {
                    totalQuestions = total;
                    loadQuestion(currentQuestionIndex);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        function loadQuestion(index) {
            showLoadingIndicator();
            $.ajax({
                url: '{{ route("load.questions") }}',
                type: 'GET',
                data: { index: index },
                dataType: 'json',
                success: function (pertanyaan) {
                    var daftarPertanyaan = $('#daftar-pertanyaan');
                    daftarPertanyaan.empty();

                    if (pertanyaan === undefined || pertanyaan.opsi === undefined) {
                        console.log("Sudah mencapai akhir pertanyaan.");
                        $('#nextButton').prop('disabled', true);
                        console.log("Jawaban Terpilih:", selectedAnswers);
                        return;
                    }
                    console.log("Respon Server:", pertanyaan);

                    var pertanyaanHTML = '<div class="card mb-3">';
                    pertanyaanHTML += '<div class="card-body">';
                    pertanyaanHTML += '<p class="card-text">' + pertanyaan.pertanyaan + '</p>';

                    var pilihan = JSON.parse(pertanyaan.opsi);
                    if (Array.isArray(pilihan) && pilihan.length > 0) {
                        $.each(pilihan, function (index, value) {
                            pertanyaanHTML += '<div class="form-check">';
                            pertanyaanHTML += '<input class="form-check-input" type="radio" name="pertanyaan_' + pertanyaan.id + '" value="' + value + '" ';

                            // Setel radio button menjadi "checked" jika jawaban telah dipilih sebelumnya
                            if (selectedAnswers[currentQuestionIndex] && selectedAnswers[currentQuestionIndex].answer === value) {
                                pertanyaanHTML += 'checked ';
                            }

                            pertanyaanHTML += '> ';
                            pertanyaanHTML += '<label class="form-check-label">' + value + '</label>';
                            pertanyaanHTML += '</div>';
                        });
                    } else {
                        pertanyaanHTML += '<input type="text" class="form-control" name="pertanyaan_' + pertanyaan.id + '" placeholder="Masukkan Jawaban Anda"';

                        // Setel nilai teks input jika jawaban telah dimasukkan sebelumnya
                        if (selectedAnswers[currentQuestionIndex]) {
                            pertanyaanHTML += ' value="' + selectedAnswers[currentQuestionIndex].answer + '"';
                        }

                        pertanyaanHTML += '>';
                    }

                    pertanyaanHTML += '</div>';
                    pertanyaanHTML += '</div>';
                    daftarPertanyaan.append(pertanyaanHTML);

                    // Jika pertanyaan pertama, sembunyikan tombol "Kembali"
                    if (currentQuestionIndex === 1) {
                        $('#backButton').hide();
                        $('#submitButton').hide();

                    } else {
                        $('#backButton').show();
                    }

                    // Aktifkan tombol "Selanjutnya" untuk pertanyaan saat ini
                    $('#nextButton').prop('disabled', false);
                    hideLoadingIndicator();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    hideLoadingIndicator();
                }
            });
        }

        function loadNextQuestion() {
            var selectedAnswer = $('input[name="pertanyaan_' + currentQuestionIndex + '"]:checked').val();
            if (selectedAnswer !== undefined) {
                // Simpan jawaban terpilih untuk indeks pertanyaan saat ini

                selectedAnswers.push({
                    pertanyaan_id: currentQuestionIndex, // Tambahkan ID pertanyaan saat ini
                    answer: selectedAnswer,
                });



            } else {
                // Jika tidak ada opsi yang dipilih, cek apakah pertanyaan saat ini menggunakan inputan teks
                var inputTextValue = $('input[name="pertanyaan_' + currentQuestionIndex + '"]').val();
                if (inputTextValue !== "") {
                    // Jika inputan teks tidak kosong, simpan nilai inputan tersebut
                    selectedAnswers.push({
                        pertanyaan_id: currentQuestionIndex, // Tambahkan ID pertanyaan saat ini
                        answer: inputTextValue,
                    });
                }
                $('#submitButton').show();


            }

            // Lanjutkan dengan kode Anda yang lain...
            currentQuestionIndex++;

            if (currentQuestionIndex > totalQuestions) {
                console.log("Sudah mencapai akhir pertanyaan.");
                console.log("Jawaban Terpilih:", selectedAnswers);

                // Mengirim data jawaban terpilih melalui permintaan AJAX
               $.ajax({
                    url: '{{ route("simpan.jawaban") }}',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // Menambahkan CSRF token
                        selectedAnswers: JSON.stringify(selectedAnswers)
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log("Respon Server:", response);
                        // Di sini Anda dapat menangani respons dari server setelah penyimpanan data berhasil dilakukan.
                        // Contoh: Menampilkan pesan sukses atau mengalihkan ke halaman lain.
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        // Di sini Anda dapat menangani kesalahan saat menyimpan data.
                        // Contoh: Menampilkan pesan error atau mengambil tindakan yang sesuai.
                    }
                });

                // Mengatur ulang selectedAnswers agar kosong setelah data berhasil disimpan
                selectedAnswers = [];

                // Ubah teks tombol menjadi "Selanjutnya" kembali
                $('#nextButton').text('Selanjutnya');
                $('#nextButton').prop('disabled', false);
            } else {
                loadQuestion(currentQuestionIndex);
            }
        }

        function loadPreviousQuestion() {
            if (currentQuestionIndex > 1) {
                // Kembali ke pertanyaan sebelumnya dan hapus jawaban terakhir dari array selectedAnswers
                currentQuestionIndex--;

                console.log("Jawaban saat ini (sebelum kembali ke pertanyaan sebelumnya):", selectedAnswers);

                loadQuestion(currentQuestionIndex);
            }
        }


        function submitForm() {
            // ... (kode AJAX Anda untuk menyimpan data)
            // Di sini Anda dapat mengirimkan data yang terkumpul melalui permintaan AJAX ke backend untuk diproses.
            selectedAnswers = selectedAnswers.filter(answer => answer !== null);

            // console.log("Seluruh Jawaban:", selectedAnswers); // Tampilkan seluruh jawaban

            // Contoh:
            $.ajax({
                url: '{{ route("simpan.jawaban") }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Menambahkan CSRF token
                    selectedAnswers: JSON.stringify(selectedAnswers)
                },
                dataType: 'json',
                success: function (response) {
                    console.log("Respon Server:", response);
                    // Di sini Anda dapat menangani respons dari server setelah penyimpanan data berhasil dilakukan.
                    // Contoh: Menampilkan pesan sukses atau mengalihkan ke halaman lain.
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    // Di sini Anda dapat menangani kesalahan saat menyimpan data.
                    // Contoh: Menampilkan pesan error atau mengambil tindakan yang sesuai.
                }
            });
        }
    </script>
</body>
</html>
