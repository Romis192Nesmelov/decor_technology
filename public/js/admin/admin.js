$(document).ready(function () {
    $('a.img-preview').fancybox({
        padding: 3
    });
    window.token = $('input[name=_token]').val();
    // Phone mask
    $('input[name=phone]').mask("+7(999)999-99-99");

    // Preview upload image
    $('input[type=file]').change(function () {
        var input = $(this)[0],
            parent = $(this).parents('.edit-image-preview'),
            imagePreview = parent.find('img');

        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.attr('src', e.target.result);
                if (!imagePreview.is(':visible')) imagePreview.fadeIn();
            };
            reader.readAsDataURL(input.files[0]);
        } else if (parent.hasClass('file-advanced')) {
            imagePreview.attr('src', '');
            imagePreview.fadeOut();
        } else {
            imagePreview.attr('src', '/images/placeholder.jpg');
        }
    });

    // Click to delete items
    $('.glyphicon-remove-circle').click(function () {
        deleteItem($(this));
    });

    // Click YES on delete modal
    $('.delete-yes').click(function () {
        $('#'+localStorage.getItem('delete_modal')).modal('hide');
        $.post(localStorage.getItem('delete_function'), {
            '_token': window.token,
            'id': localStorage.getItem('delete_id'),
        }, function (data) {
            if (data.success) {
                var row = localStorage.getItem('delete_row');
                $('#'+row).remove();
            }
        });
    });
});

function deleteItem(obj) {
    var deleteModal = $('#'+obj.attr('modal-data'));

    localStorage.clear();
    localStorage.setItem('delete_id',obj.attr('del-data'));
    localStorage.setItem('delete_function',deleteModal.find('.modal-body').attr('del-function'));
    localStorage.setItem('delete_row', (obj.parents('tr').length ? obj.parents('tr').attr('id') : obj.parents('.col-lg-2').attr('id')));
    localStorage.setItem('delete_modal',obj.attr('modal-data'));

    deleteModal.modal('show');
}

function translit(text, engToRus) {
    var rus = "?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ??".split(/ +/g),
        eng = "shh sh ch cz yu ya yo zh `` y' e` a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g);

    var x;
    for(x=0;x<rus.length; x++) {
        text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
        text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());
    }
    return text;
}
