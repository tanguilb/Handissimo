/**
 * Created by axcel on 22/11/16.
 */

    $('body').on('submit', '.ajaxForm', function (e) {

        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize()
        })

        .done(function (data) {
            $('#giveOpinion').modal('hide');
            if (typeof data.message !== 'undefined') {
                $('#alert-success').fadeIn().html(data.message).delay(6000).fadeOut(1000);
            }
        })

        .fail(function () {
            $('#giveOpinion').modal('hide');
            $('#alert-danger').fadeIn().html('Votre avis n\'a pas été envoyé. Réessayez ultérieurement ou <a class="alert-link" href="#"> contactez-nous.</a>').delay(8000).fadeOut(1000);
        });

        document.getElementById("form_body").reset();

    });

    $('#showModal').click('show.bs.modal', function () {
        createRecaptcha();
    });

    function createRecaptcha() {
        grecaptcha.render("g-recaptcha", {sitekey: "6Lc8vBYUAAAAAB8DSXyHoqJF40zsbd14Wd_NBnpC"})
    }