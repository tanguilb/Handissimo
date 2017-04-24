$( document ).ready(function() {
    $("#research_action_postal").keyup(function(){
        var city = $(this).val();
        if ( city.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/ajaxcity/" + city,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var cities = JSON.parse(response.data);
                    var html = "";
                    for (var i = 0; i < cities.length; i++) {
                        html += "<li>" + cities[i].name + "</li>";
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
