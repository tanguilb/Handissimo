$(document).ready(function() {
    $("#alert_content-btn").on("click", function () {
        $(this).attr('disabled', 'disabled');
        var org_id = $('#alert_content-btn').val();
        var form = {};
        form['id'] = org_id;
        form['choice'] = $('#handissimo_alert_content_choice').val();
        form['description'] = $('#handissimo_alert_content_description').val();
        $.ajax({
            url: "/structure/" + org_id + "/alert_content",
            type: "POST",
            data: {"form": form},
            dataType: "json",
            timeout: 3000,
            success: function () {
                $('#alert_content-btn').removeAttr('disabled', 'disabled');
                $('#captcha-repeat').val('');
                $('#form_body')[0].reset();
                window.location.reload();
            }
        });
    });

    var elt = document.getElementById('text-captcha');
    var captcha = elt.innerText;
    $('#alert_content-btn').hide();

    $('#captcha-repeat').keyup(function () {
        var captchaRepeat = $('#captcha-repeat').val();

        if (captcha == captchaRepeat) {
            $('#alert_content-btn').show();
        }
    })
});
