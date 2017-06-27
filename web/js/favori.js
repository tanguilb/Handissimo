$(document).ready(function() {
    $("input:checkbox").on("click", function () {
        var articleRev = $(this).val();
        var org_id = $(this).attr('id');
        var checked = $(this).is(':checked');
        if (checked){
            $.ajax({
                url: "/profile/version/" + org_id + "/add",
                type: "POST",
                data: {"rev": articleRev},
                timeout: 3000,
                success: function () {
                }
            });
        }else {
            uncheck(org_id, articleRev);
        }
    });
    function uncheck(org_id, articleRev){
        $.ajax({
            url: "/profile/version/" + org_id + "/remove",
            type: "POST",
            data: {"rev": articleRev},
            cache: false,
            timeout: 3000,
            success: function(){
            }
        });
    }
});

