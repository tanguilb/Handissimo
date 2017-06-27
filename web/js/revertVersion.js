function revertOldVersionFunction(org_id, rev) {
    var value = $('#btn-old-version').val();
    $.ajax({
        url: "/profile/view/revert/" + org_id + "/" + rev,
        type: "POST",
        data: {data: value},
        timeout: 3000,
        success: function (urlFromController) {
            window.location.href = urlFromController;
        }
    });
}

function checkedVersionFunction(rev) {
    var value = $('#btn-list-version').val();
    $.ajax({
     url: "/profile/view/"+value+"/"+rev+"/checked",
     type: "POST",
     timeout: 3000,
     success: function (urlFromController) {
        window.location.href = urlFromController
     }
     })
}
