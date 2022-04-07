let postId = 0;
let postBodyEl = null

$('.post').find('.interaction').find('.edit').on('click', function (e) {
    e.preventDefault();



    postBodyEl = e.target.parentNode.parentNode.childNodes[1];
    let postBody = postBodyEl.textContent;
    postId = e.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
})

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'post',
        url: url,
        data: {
            body: $('#post-body').val(),
            postId: postId,
            _token: token
        }
    }).done(function (msg) {
        $(postBodyEl).text(msg['new_body']);
        $('#editModal').modal('hide')
    })
})
