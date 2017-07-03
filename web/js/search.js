$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});


$('#research_action_disability').select2({
    placeholder: 'Précisez le(s) handicap(s) (facultatif)',
    role: 'presentation'
});

$('#research_action_structure').select2({
    placeholder: 'Précisez le type de structure (facultatif)',
    multiple: false
});

$('#research_action_need').select2({
    placeholder: 'Plusieurs choix possibles (facultatif)'
});

$(window).resize(function() {
    $('.select2').css('width', "100%");
});
