/**
 * Created by tangui on 22/03/17.
 */
$( document ).ready(function () {
    var id = document.getElementsByClassName("arraymail");
    for (var i = 0; i < id.length; i++)
    {
        var orgid = JSON.parse(id[i].value);
        $.ajax({
            type: "POST",
            url:  "/mail/" + orgid.id,
            dataType: 'json',
            timeout: 3000,
            success: function(response){
                var mail = JSON.parse(response.data);
                html = "";

                for(var i = 0 ; i < mail.length; i++)
                {
                    html += '<a class="address-line link-about" href="' + 'mail' + 'to:' + mail[i].mail +'"' + 'target="_blank">' + mail[i].mail + '</a>';
                }
                $('#mail').html(html);
            },
            error: function() {
                $('#mail').text('Ajax call error');
            }
        });
    }
});
