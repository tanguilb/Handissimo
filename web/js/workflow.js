    function replayFunction(org_id) {
        var value = $('#replayButton').val();
        alert(value);
        $.ajax({
            //url: Routing.generate('handissimo_profile_ajax_replay', { id: org_id, data: value }),
            url: "/profile/view/ajax/"+org_id+"/" + value,
            type: "POST",
            dataType: "json",
            timeout: 3000,
            success: function (response) {

            }
        })
    }
