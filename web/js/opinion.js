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
                $('div#alert-success').show().html(data.message).hide();
            }
        })

        .fail(function (data) {
            $('#giveOpinion').modal('hide');
                $('div#alert-danger').show().html(data.message).hide();
        })
    });

