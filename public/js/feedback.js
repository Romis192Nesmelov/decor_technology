$(document).ready(function ($) {
    $('input[name=phone]').mask("+7(999)999-99-99");

    $('form.form button[type=submit]').click(function(e) {
        e.preventDefault();
        var body = $('body'),
            form = $(this).parents('form'),
            popup = form.parents('.modal'),
            button = form.find('button[type=submit]'),
            agree = form.find('input[name=agree]'),
            loader = $('<div></div>').attr('id','loader').append($('<div></div>')),
            formData = new FormData;

        if (!agree.is(':checked')) return false;

        agree.change(function () {
            if (agree.is(':checked')) button.removeAttr('disabled');
            else button.attr('disabled','disabled');
        });

        form.find('input, textarea, select').each(function () {
            var self = $(this);
            if (self.attr('type') == 'file') formData.append(self.attr('name'),self[0].files[0]);
            else if (self.attr('type') == 'checkbox' || self.attr('type') == 'radio') formData = processingCheckFields(formData,self);
            else formData = processingFields(formData,self);
        });

        $('.invalid-feedback.error').html('').hide();
        form.find('input, select, textarea, button').attr('disabled','disabled');
        addLoader(body,loader);

        console.log(234234);

        $.ajax({
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                closePopup(body,popup);
                unlockAll(body,form,loader);
                form.find('input, textarea').val('');
                var messageModal = $('#message');
                messageModal.find('h3').html(data.message);
                messageModal.modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var responseMsg = jQuery.parseJSON(jqXHR.responseText),
                    replaceErr = {
                        'phone':'«Телефон»',
                        'email':'«E-mail»',
                        'user_name':'«Имя»'
                    };

                $.each(responseMsg.errors, function (field, error) {
                    var errorMsg = error[0],
                        errorBlock = form.find('.invalid-feedback.error.'+field);

                    $.each(replaceErr, function (src,replace) {
                        errorMsg = errorMsg.replace(src,replace);
                    });
                    errorBlock.html(errorMsg).show();
                });
                unlockAll(body,form,loader);
            }
        });
    });
});

function processingFields(formData, inputObj) {
    if (inputObj.length) {
        $.each(inputObj, function (key, obj) {
            if (obj.type != 'checkbox' && obj.type != 'radio') {
                formData.append(obj.name,obj.value);
            }
        });
    }
    return formData;
}

function processingCheckFields(formData, inputObj) {
    if (inputObj.length) {
        inputObj.each(function(){
            var _self = $(this);
            if(_self.is(':checked')) {
                formData.append(_self.attr('name'),_self.val());
            }
        });
    }
    return formData;
}

function unlockAll(body,form,loader) {
    form.find('input, select, textarea, button').removeAttr('disabled');
    loader.remove();
}

function closePopup(body,modal) {
    modal.modal('hide');
    body.css({
        'overflow':'auto',
        'padding-right':0
    });
}


function addLoader(body,loader) {
    body.prepend(loader.css('top',window.scrollY));
    body.css({
        'overflow':'hidden',
        'padding-right':20
    });
}
