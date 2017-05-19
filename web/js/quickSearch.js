/**
 * Created by tangui on 16/05/17.
 */
$(document).ready(function(){
    $('#quick-search').click(function(){
        $('#advanced-search-container').slideUp();
        $('#quick-search-container').show();
    });
    $('#advanced-search').click(function(){
        $('#quick-search-container').slideUp();
        $('#advanced-search-container').show();
    })

});
