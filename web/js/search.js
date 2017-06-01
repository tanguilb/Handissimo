$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});


$('#research_action_disability').select2({
    placeholder: 'Précisez le(s) handicap(s) (facultatif)'
});

$('#research_action_structure').select2({
    placeholder: 'Precisez le type de structure (facultatif)',
    multiple: false
});

$('#research_action_need').select2({
    placeholder: 'Scolarité, soin, établissement… (facultatif)'
});

$(window).resize(function() {
    $('.select2').css('width', "100%");
});
