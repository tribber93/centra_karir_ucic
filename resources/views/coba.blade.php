<!DOCTYPE html>
<html>
<head>
    <title>Nga-jeep</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Pertanyaan</h1>
        <div id="daftar-pertanyaan">
        </div>
        <button id="nextButton" class="btn btn-primary mt-3" onclick="loadNextQuestion()">Next</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var currentQuestionIndex = 1; // Variabel untuk melacak indeks pertanyaan saat ini

        $(document).ready(function () {
            loadQuestion(currentQuestionIndex);
        });

        function loadQuestion(index) {
            $.ajax({
                url: '{{ route("load.questions") }}',
                type: 'GET',
                data: { index: index },
                dataType: 'json',
                success: function (pertanyaan) {
                    var daftarPertanyaan = $('#daftar-pertanyaan');
                    daftarPertanyaan.empty();

                    var pertanyaanHTML = '<div class="card mb-3">';
                    pertanyaanHTML += '<div class="card-body">';
                    pertanyaanHTML += '<p class="card-text">' + pertanyaan.pertanyaan + '</p>';

                    var pilihan = JSON.parse(pertanyaan.opsi);
                    if (Array.isArray(pilihan) && pilihan.length > 0) {
                        $.each(pilihan, function (index, value) {
                            pertanyaanHTML += '<div class="form-check">';
                            pertanyaanHTML += '<input class="form-check-input" type="radio" name="pertanyaan_' + pertanyaan.id + '" value="' + value + '"> ';
                            pertanyaanHTML += '<label class="form-check-label">' + value + '</label>';
                            pertanyaanHTML += '</div>';
                        });
                    } else {
                        pertanyaanHTML += '<input type="text" class="form-control" name="pertanyaan_' + pertanyaan.id + '" placeholder="Masukkan Jawaban Anda">';
                    }

                    pertanyaanHTML += '</div>';
                    pertanyaanHTML += '</div>';
                    daftarPertanyaan.append(pertanyaanHTML);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function loadNextQuestion() {
            currentQuestionIndex++;
            loadQuestion(currentQuestionIndex);
        }
    </script>
</body>
</html>
