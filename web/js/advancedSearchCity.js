/**
 * Created by tangui on 19/01/17.
 */
$( document ).ready(function() {
    $("#research_advanced_postal").keyup(function(){
        var postalcode = $(this).val();
        if ( postalcode.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/ajaxcity/" + postalcode,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var postalcodes = JSON.parse(response.data);
                    var html = "";
                    for (var i = 0; i < postalcodes.length; i++) {
                        html += "<li>" + postalcodes[i].postal + "</li>";
                    }

                    $('#city').html(html);
                    $('#city').find('li').on('click', function() {
                        $('#research_advanced_postal').val($(this).text());
                        $('#city').html('');
                    });
                },
                error: function() {
                    $('#city').text('Ajax call error');
                }
            });
        } else {
            $('#city').html('');
        }
    });
});
