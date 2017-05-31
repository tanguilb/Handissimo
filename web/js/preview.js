/**
 * Created by tangui on 29/05/17.
 */
$( document ).ready(function(){
    $('#preview').click(function(){
        var orgaName = $('#handissimobundle_organizations_name').val();
        var structure = $('input[type=radio]:checked').val();
        var form = $('#orga-new');
        var valeurs = []
        valeurs.push(orgaName, structure);

        alert(structure);
        var desc = CKEDITOR.instances["handissimobundle_organizations_organizationDescription"].getData();
        var values = JSON.parse(structure);

        alert(values);

            $.ajax({
                type: "jsonp",
                url: "{{path(preview_action)}}",
                data: values,
                dataType: 'html',
                success: function(result){
                    console.log(result);
                },
                error: function(e){
                    console.log(e);
                }
            });

    });
});