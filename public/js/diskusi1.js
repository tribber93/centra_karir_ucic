  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': getCsrfToken()
    }
  });
  $('.delete-button').click(function(e) {
    e.preventDefault(); // Mencegah tindakan default dari tautan

    const commentId = $(this).data('comment-id');
    $('#m-a-f').modal('show');
    $('#m-a-f .btn.indigo').click(function() {
        // Mengirim permintaan DELETE setelah tombol "Yes" di modal ditekan
        $.ajax({
            url: '/delete-discussion/' + commentId,
            type: 'GET',
            headers: {
                'X-CSRF-Token': getCsrfToken()
            },
            success: function (response) {
                if (response.status === 'success') {
                    console.log('Data komentar berhasil dihapus.');
          location.reload();


                }
            },
            error: function (error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
  });

  function handleFormSubmitDiskusi2() {
    const judulValue = $('#judul').val();
    const isiValue = $('#isi').val();
    const discussionId = $('#discussion_id').val();

    const formData = {
      judul: judulValue
      , isi: isiValue
    };

    let url = discussionId ? '/edit-discussion/' + discussionId : '/posting-diskusi';

    $.ajax({
      url: url
      , type: 'POST'
      , headers: {
        'X-CSRF-Token': getCsrfToken()
      }
      , data: JSON.stringify({
        data: formData
      })
      , contentType: 'application/json; charset=utf-8'
      , dataType: 'json'
      , success: function(response) {
        if (response.status === 'success') {
          console.log('Data berhasil disimpan ke tabel.');
          location.reload();
        }
      }
      , error: function(error) {
        console.error('Terjadi kesalahan:', error);
      }
    });
  }
  $('.edit-button').click(function() {
    const discussionId = $(this).data('discussion-id');

    $.ajax({
      url: '/get-discussion/' + discussionId
      , type: 'GET'
      , success: function(response) {
        const discussion = response.data;
        // alert("Data diskusi:\n" +
        //       "ID: " + discussion.id + "\n" +
        //       "Judul: " + discussion.judul + "\n" +
        //       "Isi: " + discussion.isi);
        $('#discussion_id').val(discussion.id); // Set nilai ID diskusi untuk edit
        $('#judul').val(discussion.judul);
        $('#isi').val(discussion.isi);

        $('#my-form').attr('action', '/edit-discussion/' + discussionId);
        $('.info').text('Edit');
        $('.judul').text('Edit Diskusi');

        $('html, body').animate({
          scrollTop: $('#my-form').offset().top
        }, 500);
      }
      , error: function(error) {
        console.error('Terjadi kesalahan:', error);
      }
    });
  });

  function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
  }
