$(document).ready(function() {
    var theHREF;

    $( "#dialog-confirm" ).dialog({
        resizable: false,
        height:160,
        width:500,
        autoOpen: false,
        modal: true,
        buttons: {
            "Oui": function() {
                $( this ).dialog( "close" );
                window.location.href = theHREF;
                window.location.reload()
            },
            "Annuler": function() {
                $( this ).dialog( "close" );
            }
        }
    });

    $("#btn-star-version").on("click", function(e) {
        e.preventDefault();
        theHREF = $(this).attr("href");
        $("#dialog-confirm").dialog("open");
    });

});
