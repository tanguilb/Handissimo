$( document ).ready(function() {
    $("#search_profile_profileSearch").keyup(function(){
        var profileSearch = $(this).val();
        if ( profileSearch.length >= 2 ) {
            $.ajax({
                type: "POST",
                url: "/profile/search/ajax/" + profileSearch,
                dataType: 'json',
                timeout: 3000,
                success: function(response){
                    var profileSearchs = JSON.parse(response.data);
                    html = "";
                    for (var i = 0; i < profileSearchs.length; i++) {
                        html += "<li>" + profileSearchs[i].name + "</li>";
                    }

                    $('#list-name').html(html);
                    $('#list-name').find('li').on('click', function() {
                        $('#search_profile_profileSearch').val($(this).text());
                        $('#list-name').html('');
                    });
                },
                error: function() {
                    $('#list-name').text('Ajax call error');
                }
            });
        } else {
            $('#list-name').html('');
        }
    });

});