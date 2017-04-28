$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(function () {
    $('#modal-charte').bind('scroll', function () {
        if ($(this).scrollTop() + $(this).innerHeight()>= $(this)[0].scrollHeight)
        {
            document.getElementById('btn-compact').removeAttribute('disabled');
        }
    });

    $('#btn-compact').on('click', function () {
        document.getElementById('front_user_registration_form_compact').checked = true;
        document.getElementById('submit-register').removeAttribute('disabled');
    })
});