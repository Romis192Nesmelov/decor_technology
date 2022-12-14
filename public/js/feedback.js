$(document).ready(function ($) {

    $('input[name=phone]').keyup(function () {
            unlockSendButton($(this));
        }
    ).mask("+7(999)999-99-99", {
        completed: function () {
            unlockSendButton($(this));
        }
    });

    $('input[name=agree]').change(function () {
        unlockSendButton($(this));
    });

    $('form.form button[type=submit]').click(function(e) {
        e.preventDefault();
        var body = $('body'),
            form = $(this).parents('form'),
            popup = form.parents('.modal'),
            agree = form.find('input[name=agree]'),
            formData = new FormData;

        if (!agree.is(':checked')) return false;

        form.find('input, textarea, select').each(function () {
            var self = $(this);
            if (self.attr('type') == 'file') formData.append(self.attr('name'),self[0].files[0]);
            else if (self.attr('type') == 'checkbox' || self.attr('type') == 'radio') formData = processingCheckFields(formData,self);
            else formData = processingFields(formData,self);
        });

        $('.invalid-feedback.error').html('').hide();
        form.find('input, select, textarea, button').attr('disabled','disabled');
        addLoader();

        $.ajax({
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                closePopup(popup);
                lockAll(body,form);
                form.find('input, textarea').val('');

                let messageModal = $('#tech-modal');
                messageModal.find('.modal-title').html('Спасибо за Ваше обращение!');
                messageModal.find('.modal-body').html('<h6>' + data.message + '</h6>');
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

function lockAll(body,form) {
    form.find('button').attr('disabled','disabled');
    form.find('input[name=phone]').val('');
    $('#loader').remove();
}

function closePopup(modal) {
    modal.modal('hide');
    $('body').css({
        'overflow':'auto',
        'padding-right':0
    });
}

function addLoader() {
    $('body').css({
        'overflow':'hidden',
        'padding-right':20
    }).append($('<div></div>').attr('id','loader').append($('<img />').attr('src','/images/preloader.gif')));
}

function removeLOader() {
    $('#loader').remove();
    $('body').css({
        'overflow':'auto',
        'padding-right':0
    });
}

function unlockSendButton(obj) {
    let phoneRegExp = /^((\+)?(\d)(\s)?(\()?[0-9]{3}(\))?(\s)?([0-9]{3})(\-)?([0-9]{2})(\-)?([0-9]{2}))$/gi,
        form = obj.parents('form'),
        checkBox = form.find('input[name=agree]'),
        phoneInput = form.find('input[name=phone]'),
        button = form.find('button[type=submit]');

    if (checkBox.is(':checked') && phoneInput.val().match(phoneRegExp)) button.removeAttr('disabled');
    else button.attr('disabled','disabled');
}
