$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});

$("#research_action_need").change(function () {
    if($(this).val() == "") $(this).addClass("empty-need");
    else $(this).removeClass("empty-need")
});
$("#research_action_need").change();

$(".js-example-basic-multiple").select2();

$('#research_action_disability').select2({
    placeholder: 'Précisez le handicap'
});

$('#research_action_structure').select2({
    placeholder: 'Précisez le type de structure'
});

$(window).resize(function() {
    $('.select2').css('width', "100%");
});