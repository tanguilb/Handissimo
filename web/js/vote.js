$(document).ready(function () {
    $(".vote-like").on('click', function () {
        var like = $(this).val();
        alert(like);
        $.ajax({
            type: "POST",
            url: "/" + like,
            datatype: 'json',
            timeout: 3000,
            success: function (response) {

            }
        })
    })

    $(".vote-dislike").on('click', function () {
        var dislike = $(this).val();
        alert(dislike);
        $.ajax({
            type: "POST",
            url: "/" + dislike,
            datatype: 'json',
            timeout: 3000,
            success: function (response) {

            }
        })
    })

});

