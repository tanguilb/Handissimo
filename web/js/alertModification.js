$(document).ready(function() {

    $( "#dialog-message" ).dialog({
        resizable: false,
        height:160,
        width:500,
        autoOpen: false,
        modal: true,
        buttons: {
            "Ok": function() {
                $( this ).dialog( "close" );
            }
        }
    });

    $("#alert-modification").on("click", function(e) {
        e.preventDefault();
        $("#dialog-message").dialog("open");
    });

});