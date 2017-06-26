$(document).ready(function() {
    $("input:checkbox").on("click", function () {
        var org_id = $(this).attr('id');
        var checked = $(this).is(':checked');
        if (checked){
            $.ajax({
                url: "/profile/list/" + org_id + "/add",
                type: "POST",
                timeout: 3000,
                success: function () {
                    changeColor(org_id, 'green');
                    $('#'+org_id).next().text('Oui');
                }
            });
        }else {
            uncheck(org_id);
        }
    });
    
    function uncheck(org_id){
        $.ajax({
            url: "/profile/list/" + org_id + "/remove",
            type: "POST",
            cache: false,
            timeout: 3000,
            success: function(){
                $('#'+org_id).next().text(' ');
            }
        });
    }
    
    function changeColor(id, newColor) {
        $("#" + id).next().css("color", newColor);
    }
});