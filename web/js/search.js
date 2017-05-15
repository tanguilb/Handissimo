$(function () {
    $('[data-toggle="tooltip"]').tooltip({"html":true})
});

$("#research_action_need").change(function () {
    if($(this).val() == "") $(this).addClass("empty-need");
    else $(this).removeClass("empty-need")
});
$("#research_action_need").change();