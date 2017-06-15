/**
 * Created by tangui on 09/06/17.
 */


    $('#preview').on("click", function () {
        /*var values = {};
        values['name'] = $('#handissimobundle_organizations_name').val();
        values['structure'] = $('input[type=radio]:checked').val();
        values['gestionnaire'] = $('#handissimobundle_organizations_society').val();
        values['desc'] = CKEDITOR.instances["handissimobundle_organizations_organizationDescription"].getData();
        //console.log(data);*/
        var values = $(this).val();
        alert(values);
        $.ajax({
            type: "POST",
            url: "/ajax/preview",
            data: {value : values},
            dataType: "json",
            timeout: 3000,
            success: function(/*urlFromController*/) {
                //window.location.href = urlFromController;
                console.log(values)
            }
        });
    });



