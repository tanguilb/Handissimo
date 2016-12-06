/**
 * Created by tangui on 05/12/16.
 */
$( document ).ready(function() {
    $("#handissimobundle_research_keyword").keyup(function() {
        var keyword = $(this).val();
        if ( keyword.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/research/ajax/" + keyword,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var keywords = JSON.parse(response.data);
                    console.log(keywords);
                    html = "";
                    for (i = 0; i < keywords.length; i++) {

                        html += "<li>" + keywords[i].disabilityName + "</li>";
                        console.log(html);
                    }
                    $('#keywordautocomplete').html(html);
                    $('#keywordautocomplete li').on('click', function() {
                        $('#handissimobundle_research_keyword').val($(this).text());
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
