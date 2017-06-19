/**
 * Created by tangui on 09/06/17.
 */
    function previewFunction() {

        var values = {};
        values['name'] = $('#handissimobundle_organizations_name').val();
        values['society'] = $('#handissimobundle_organizations_society').val();
        values['adress'] = $('#handissimobundle_organizations_address').val();
        values['adressComplement'] = $('#handissimobundle_organizations_addressComplement').val();
        values['postal'] = $('#handissimobundle_organizations_postal').val();
        values['city'] = $('#handissimobundle_organizations_city').val();
        values['phoneNumber'] = $('#handissimobundle_organizations_phone_number').val();
        values['mail'] = $('#handissimobundle_organizations_mail').val();
        values['directorName'] = $('#handissimobundle_organizations_directorName').val();
        values['website'] = $('#handissimobundle_organizations_website').val();
        values['facebook'] = $('#handissimobundle_organizations_facebook').val();
        values['structure'] = $('#handissimobundle_organizations_orgaStructure input[type=radio]:checked').val();
        values['disabilitytypes'] = $('#handissimobundle_organizations_disabilitytypes input:checked').map(function() {
            return this.value;
        }).get().join();
        values['ageMini'] = $('#handissimobundle_organizations_agemini').val();
        values['ageMaxi'] = $('#handissimobundle_organizations_agemaxi').val();
        values['freeplace'] = $('#handissimobundle_organizations_freeplace').val();
        values['interventionZone'] = $('#handissimobundle_organizations_interventionZone').val();
        values['organizationDescription'] = CKEDITOR.instances["handissimobundle_organizations_organizationDescription"].getData();
        values['needs'] = $('#handissimobundle_organizations_needs input:checked').map(function() {
            return this.value;
        }).get().join();
        values['secondNeeds'] = $('#handissimobundle_organizations_secondneeds input:checked').map(function() {
            return this.value;
        }).get().join();
        values['workingDescription'] = CKEDITOR.instances["handissimobundle_organizations_workingDescription"].getData();
        values['schoolYN'] = $('#handissimobundle_organizations_school input[type=radio]:checked').val();
        values['schoolDescription'] = CKEDITOR.instances["handissimobundle_organizations_schoolDescription"].getData();
        values['dayDescription'] = CKEDITOR.instances["handissimobundle_organizations_dayDescription"].getData();
        values['receptionDescription'] = CKEDITOR.instances["handissimobundle_organizations_receptionDescription"].getData();
        values['teamMembersNumber'] = $('#handissimobundle_organizations_teamMembersNumber').val();
        values['stafforganizations'] = $('#handissimobundle_organizations_stafforganizations input:checked').map(function() {
            return this.value;
        }).get().join();
        values['socialstaffs'] = $('#handissimobundle_organizations_socialstaffs input:checked').map(function() {
            return this.value;
        }).get().join();
        values['otherjobs'] = $('#handissimobundle_organizations_otherjobs input:checked').map(function() {
            return this.value;
        }).get().join();
        values['commentStaff'] = CKEDITOR.instances["handissimobundle_organizations_commentStaff"].getData();
        values['openhours'] = $('#handissimobundle_organizations_openhours').val();
        values['opendays'] = $('#handissimobundle_organizations_opendays input:checked').map(function() {
            return this.value;
        }).get().join();
        values['opendaysYear'] = $('#handissimobundle_organizations_opendaysYear input:checked').map(function() {
            return this.value;
        }).get().join();
        values['orientationMdph'] = $('#handissimobundle_organizations_orientationMdph input[type=radio]:checked').val();
        values['inscription'] = CKEDITOR.instances["handissimobundle_organizations_inscription"].getData();
        values['cost'] = CKEDITOR.instances["handissimobundle_organizations_cost"].getData();
        values['transport'] = CKEDITOR.instances["handissimobundle_organizations_transport"].getData();
        values['freeDescription'] = CKEDITOR.instances["handissimobundle_organizations_freeDescription"].getData();

    $.ajax({
            type: "POST",
            url: "/ajax/preview",
            data: {'value': values},
            dataType: "json",
            timeout: 3000,
            success: function(urlFromController) {
                window.location.href = urlFromController;
            }
            });
        }


