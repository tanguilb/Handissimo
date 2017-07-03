$(document).ready(function() {
    $("input:checkbox").on("click", function () {
        var comment_id = $(this).attr('id');
        var checked = $(this).is(':checked');
        if (checked){
            $.ajax({
                url: "/profile/comments/show/add/"+comment_id,
                type: "POST",
                timeout: 3000,
                success: function () {
                    changeColor(comment_id, 'green');
                    $('#'+comment_id).next().text('Oui');
                }
            });
        }else {
            uncheck(comment_id);
        }
    });

    function uncheck(comment_id){
        $.ajax({
            url: "/profile/comments/show/remove/"+comment_id,
            type: "POST",
            cache: false,
            timeout: 3000,
            success: function(){
                $('#'+comment_id).next().text(' ');
            }
        });
    }

    function changeColor(id, newColor) {
        $("#" + id).next().css("color", newColor);
    }

    $(document).on("change", 'input[type=radio]', function (e) {
        e.preventDefault();
        var comment_id = $(this).attr('id');
        var value = $("input[name='radio']:checked").val();
        if (value == 1){
            $.ajax({
                url: "/profile/comments/show/addPublication/" + comment_id,
                type: "POST",
                timeout: 3000
            })
        } else {
            $.ajax({
                url: "/profile/comments/show/removePublication/" + comment_id,
                type: "POST",
                timeout: 3000
            })
        }
    });

    $(".link-more").on("click", function (e) {
        var idComment= $(this).attr('name');
        e.preventDefault();
        $("#" + idComment).toggle();
        if ($(this).text() == "Lire la suite...") {
            $(this).text("Replier");
        } else {
            $(this).text("Lire la suite...")
        }
    });

    $(function () {
        $(".more span").hide();
    })
});


