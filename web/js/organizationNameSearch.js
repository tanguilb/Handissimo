/**
 * Created by tangui on 16/05/17.
 */
$( document ).ready(function() {
    $("#search_profile_organizationName").keyup(function(){
        var organizationSearch = $(this).val();
        if ( organizationSearch.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/organization/search/ajax/" + organizationSearch,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var organizationSearchs = JSON.parse(response.data);
                    html = "";
                    for (var i = 0; i < organizationSearchs.length; i++) {
                        html += "<li>" + organizationSearchs[i].name + "(" + organizationSearchs[i].postal + ")</li>";
                    }

                    $('#organization-name').html(html);
                    $('#organization-name').find('li').on('click', function() {
                        $('#search_profile_organizationName').val($(this).text());
                        $('#organization-name').html('');
                    });
                },
                error: function() {
                    $('#organization-name').text('Ajax call error');
                }
            });
        } else {
            $('#organization-name').html('');
        }
    });
});