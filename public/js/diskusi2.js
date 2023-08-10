
     $(document).ready(function() {
        $('.edit-button').click(function() {
            const buttonText = document.getElementById('changeText');
            console.log('ok')
            // alert('Button clicked!');
            buttonText.style.display = 'inline';
        });
    });
    function handleFormSubmit() {
        const isiValue = $('#isi').val();
        const h6Element = document.querySelector('p[data-id]');
        const dataIdValue = h6Element.getAttribute('data-id');
        const formData = {
            diskusiId: dataIdValue,
            isi: isiValue
        };

        $.ajax({
            url: `/posting-komentar-byID/${dataIdValue}`, // Perbaikan tanda kutip disini
            type: 'POST',
            headers: {
                'X-CSRF-Token': getCsrfToken()
            },
            data: JSON.stringify({
                data: formData
            }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    console.log('Data berhasil disimpan ke tabel.');
                    location.reload();
                }
            },
            error: function(error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

    $(document).ready(function() {
        let editingCommentId = null;

        $('.edit-button').click(function() {

            const commentId = $(this).closest('.sl-content').find('.user-name').data('id');
            editingCommentId = commentId;


            const commentBody = $(this).closest('.sl-content');
            const commentContent = commentBody.find('.text-info');
            const editInput = commentBody.find('.edit-input');
            const saveButton = commentBody.find('.save-edited-comment');

            const originalComment = commentContent.text();

            commentContent.hide();
            editInput.val(originalComment).show().focus();
            saveButton.show();
        });

        $('.save-edited-comment').click(function() {
            const newComment = $(this).closest('.sl-content').find('.edit-input').val();
            const commentId = editingCommentId;

            updateCommentOnServer(commentId, newComment);

            $(`.sl-content .user-name[data-id="${commentId}"]`).closest('.sl-content').find('.text-info').text(newComment).show();

            $(this).closest('.sl-content').find('.edit-input').hide().val('');
            $(this).hide();
        });

        $('.delete-button').click(function() {
            const commentId = $(this).data('comment-id');
            deleteComment(commentId);
        });

        function updateCommentOnServer(commentId, newComment) {
            const csrfToken = getCsrfToken();

            $.ajax({
                url: `/update-komentar/${commentId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken,
                    'Content-Type': 'application/json',
                },
                data: JSON.stringify({
                    isi: newComment
                }),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log('Komentar berhasil diperbarui di server.');
                location.reload();

                    }
                },
                error: function(error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });
        }

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
                        $(`.sl-content .user-name[data-id="${commentId}"]`).closest('.sl-item').remove();
                        location.reload();

                    }
                },
                error: function(error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });
        }

        function getCsrfToken() {
            return $('meta[name="csrf-token"]').attr('content');
        }
    });
