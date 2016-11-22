/**
 * Created by axcel on 22/11/16.
 */

$(document).ready(function() {
$.post('send.php',
    {
        name: 'Jean-Michel',
        email: 'jeanmich@caramail.com'
    }, function(data) {
        alert(data);
    });

}