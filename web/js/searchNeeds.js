/**
 * Created by tangui on 27/04/17.
 */
$( document ).ready(function() {
    $("#research_action_need").keyup(function(){
        var need = $(this).val();
        if ( need.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/ajaxneed/" + need,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var needs = JSON.parse(response.data);
                    var html = "";
                    for (var i = 0; i < needs.length; i++) {
                        html += "<li>" + needs[i].needName + "</li>";
                    }

                    $('#need').html(html);
                    $('#need').find('li').on('click', function() {
                        $('#research_action_need').val($(this).text());
                        $('#need').html('');
                    });
                },
                error: function() {
                    $('#need').text('Ajax call error');
                }
            });
        } else {
            $('#need').html('');
        }
    });
});