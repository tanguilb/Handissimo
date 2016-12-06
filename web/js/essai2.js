$( document ).ready(function() {
    $("#research_action_search").keyup(function(){
        var keyword = $(this).val();
        if ( keyword.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/research/ajax/" + keyword,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var keywords = JSON.parse(response.data);
                    var html = "";
                    for (var i = 0; i < keywords.length; i++) {
                        html += "<li>" + keywords[i].name + "</li>";
                    }

                    $('#autocomplete').html(html);
                    $('#autocomplete').find('li').on('click', function() {
                        $('#research_action_search').val($(this).text());
                        $('#autocomplete').html('');
                    });
                },
                error: function() {
                    $('#autocomplete').text('Ajax call error');
                }
            });
        } else {
            $('#autocomplete').html('');
        }
    });
});



