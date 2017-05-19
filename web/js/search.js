$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});

$("#research_action_structure").change(function () {
    if($(this).val() == "") $(this).addClass("empty-structure");
    else $(this).removeClass("empty-structure")
});
//$("#research_action_stucture").change();



$('#research_action_disability').select2({
    placeholder: 'Précisez le handicap'
});

$('#research_action_structure').select2({
    multiple: false
});

$('#research_action_need').select2()({
    placeholder: 'Scolarité, soin, établissement…'
});

$(window).resize(function() {
    $('.select2').css('width', "100%");
});
/*
function format(item) {
    var originalText = item.text;
    return "<div title ='" + originalText + "'>" + originalText + "</div>";
}*/