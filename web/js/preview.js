/**
 * Created by tangui on 09/06/17.
 */
    function previewFunction() {

        var data = {};
        data['name'] = $('#handissimobundle_organizations_name').val();
        data['structure'] = $('input[type=radio]:checked').val();
        data['gestionnaire'] = $('#handissimobundle_organizations_society').val();
        data['desc'] = CKEDITOR.instances["handissimobundle_organizations_organizationDescription"].getData();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "ajax/preview",
            data: data,
            dataType: "json",
            timeout: 3000,
            success: function(urlFromController) {
                window.location.href = urlFromController;
            }
            });
        }


