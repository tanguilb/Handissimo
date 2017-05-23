$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});


$('#research_action_disability').select2({
    placeholder: 'Précisez le handicap'
});

$('#research_action_structure').select2({
    placeholder: 'Precisez la structure',
    multiple: false
});

$('#research_action_need').select2({
    placeholder: 'Scolarité, soin, établissement…'
});

$(window).resize(function() {
    $('.select2').css('width', "100%");
});
