@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')
{{-- @include('admin.sidebar') --}}

<div class="padding">
  <div class="container mt-5">
    <div class="box p-4">
      <div class="list-item mb-3">
        <div class="list-left">
          <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
        </div>
        <div class="list-body">
          <h6>{{ $diskusi->user->name }}</h6>

          <small class="block text-muted">{{ $diskusi->created_at->diffForHumans() }}</small>
          <br>
          <h4>{{ $diskusi->judul }}</h4>
          <p>{{ $diskusi->isi }} </p>
          <i class="material-icons md-24">
            &#xe0b9;
            <span ui-include="'../assets/images/i_0.svg'"></span>
          </i>
          <span class="m-l-sm">{{ $dkC }} Komentar</span>
        </div>
        <form id="my-form" ui-jp="parsley">
          <div class="box p-4">
            <h6 data-id="{{ $diskusi->id }}">Tambah Komentar</h6>
            <div class="form-group">
              <div class="box m-b-md">
                <input type="text" name="isi" id="isi" required class="form-control" placeholder="Masukan isi Komentar">

              </div>
            </div>
            <div class="dker p-a text-right">
              <button type="button" onclick="handleFormSubmit()" class="btn info">Submit</button>
            </div>
          </div>

        </form>

      </div>
    </div>
    @foreach ($dk as $data)
    <div class="box p-4">
      <div class="list-item mb-3">
        <div class="list-left">
          <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
        </div>
        <div class="list-body">
          <div class="row ">
            <h6 data-id="{{ $data->id }}" class="col-10 user-name">{{ $data->user->name }}</h6>
            @if ($auth == $data->user->name)
            <button class="btn btn-primary edit-button">
              <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-success delete-button"  data-comment-id="{{ $data->id }}"  data-toggle="dropdown">
              <i class="fa fa-remove">
                <span ui-include="'../assets/images/i_0.svg'"></span>
              </i>
            </button>
            @endif
          </div>
          <small class="block text-muted">{{ $data->created_at->diffForHumans() }}</small>
          <br>
          <p>{{ $data->isi }}</p>
          <input type="text" class="form-control edit-input" style="display: none;">
          <button type="button" class="btn btn-primary save-edited-comment " style="display: none ;margin-top:12px">Ubah</button>
        </div>
      </div>
    </div>
    @endforeach


  </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // edit komment browh
  $(document).ready(function() {
    let originalComment = '';
    let editingCommentId = null;

    $('.edit-button').click(function() {
      const commentBody = $(this).closest('.list-body');
      const commentContent = commentBody.find('.comment-content');
      const editInput = commentBody.find('.edit-input');
      const saveButton = commentBody.find('.save-edited-comment');

      originalComment = commentContent.text();
      editingCommentId = $(this).closest('.list-item').find('.user-name').data('id');

      commentContent.hide();
      editInput.val(originalComment).show().focus();
      saveButton.show();
    });

    $('.save-edited-comment').click(function() {
      const newComment = $(this).closest('.list-body').find('.edit-input').val();
      const commentId = editingCommentId;

      console.log(commentId);
      updateCommentOnServer(commentId, newComment);

      $(`.user-name[data-id="${commentId}"]`).closest('.list-body').find('.comment-content').text(newComment).show();

      $(this).closest('.list-body').find('.edit-input').hide().val('');
      $(this).hide();

      $('#editModal').modal('hide');
    });
  });




  function updateCommentOnServer(commentId, newComment) {
    const csrfToken = getCsrfToken();

    $.ajax({
      url: `/update-komentar/${commentId}`
      , type: 'POST'
      , headers: {
        'X-CSRF-Token': csrfToken
        , 'Content-Type': 'application/json'
      , }
      , data: JSON.stringify({
        isi: newComment
      })
      , dataType: 'json'
      , success: function(response) {
        if (response.status === 'success') {
          console.log('Komentar berhasil diperbarui di server.');
          $(`.user-name[data-id="${commentId}"]`).closest('.list-body').find('.comment-content').text(newComment).show();

          // Sembunyikan input dan tombol "Ubah"
          $('.edit-input').hide().val('');
          $('.save-edited-comment').hide();
          location.reload();
        }
      }
      , error: function(error) {
        console.error('Terjadi kesalahan:', error);
      }
    });
  }
  $(document).ready(function() {
    // ... (kode lainnya)

    $('.delete-button').click(function() {
        const commentId = $(this).data('comment-id');
        deleteComment(commentId);
    });

    function deleteComment(commentId) {
        const csrfToken = getCsrfToken();

        $.ajax({
            url: `/delete-komentar/${commentId}`,
            type: 'GET',
            headers: {
                'X-CSRF-Token': csrfToken,
                'Content-Type': 'application/json',
            },
            success: function(response) {
                if (response.status === 'success') {
                    console.log('Komentar berhasil dihapus dari server.');
                    $(`.user-name[data-id="${commentId}"]`).closest('.list-item').remove();
          location.reload();

                }
            },
            error: function(error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

});
  //
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': getCsrfToken()
    }
  });


  function handleFormSubmit() {
    const isiValue = $('#isi').val();
    const h6Element = document.querySelector('h6[data-id]');
    const dataIdValue = h6Element.getAttribute('data-id');
    const formData = {
      diskusiId: dataIdValue
      , isi: isiValue
    };

    $.ajax({
      url: `/posting-komentar-byID/${dataIdValue}`, // Perbaikan tanda kutip disini
      type: 'POST'
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

  function getCsrfToken() {
    return $('meta[name="csrf-token"]').attr('content');
  }

</script>




@endsection
