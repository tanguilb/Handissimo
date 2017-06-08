    function replayFunction(org_id) {
        var value = $('#replayButton').val();
        $.ajax({
            url: "/profile/view/ajax/"+org_id+"/" + value,
            type: "POST",
            dataType: "json",
            timeout: 3000,
            success: function (urlFromController) {
                window.location.href = urlFromController;
            }
        })
    }

    function validateFunction(org_id) {
        var value = $('#validateButton').val();
        $.ajax({
            url: "/profile/view/validate/ajax/"+org_id+"/" + value,
            type: "POST",
            dataType: "json",
            timeout: 3000,
            success: function (urlFromController) {
                window.location.href = urlFromController;
            }
        })
    }
