$(document).ready(function() {
    $("#alert_content-btn").on("click", function () {
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
                $('#form_body')[0].reset();
                window.location.reload();
            }
        });
    });


});
