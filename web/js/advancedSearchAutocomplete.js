/**
 * Created by tangui on 19/01/17.
 */
$( document ).ready(function() {
    $("#research_advanced_keyword").keyup(function() {
        var keyword = $(this).val();
        if ( keyword.length >= 3 ) {
            $.ajax({
                type: "POST",
                url: "/ajax/" + keyword,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var keywords = JSON.parse(response.data);
                    html = "";
                    for (i = 0; i < keywords.length; i++) {
                        if (keyword = keywords[i].disabilityName)
                        {
                            html += "<li>" + keywords[i].disabilityName + "</li>";

                        } else if (keyword = keywords[i].name)
                        {
                            html += "<li>" + keywords[i].name + "</li>";

                        } else if (keyword = keywords[i].needName)
                        {
                            html += "<li>" + keywords[i].needName + "</li>";

                        } else if (keyword = keywords[i].structurestype)
                        {
                            html += "<li>" + keywords[i].structurestype + "</li>";

                        }else if (keyword = keywords[i].jobs)
                        {
                            html += "<li>" + keywords[i].jobs + "</li>"
                        }

                    }
                    $('#keywordautocomplete').html(html);
                    $('#keywordautocomplete li').on('click', function() {
                        $('#research_advanced_keyword').val($(this).text());
                        $('#keywordautocomplete').html('');
                    });
                },
                error: function() {
                    $('#keywordautocomplete').text('Ajax call error');
                }
            });
        } else {
            $('#keywordautocomplete').html('');
        }
    });
});