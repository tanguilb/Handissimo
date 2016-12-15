$( document ).ready(function() {
    $("#research_action_postal").keyup(function(){
        var postalcode = $(this).val();
        if ( postalcode.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/research/ajaxcity/" + postalcode,
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
                        $('#research_action_postal').val($(this).text());
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
