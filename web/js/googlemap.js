/* Déclaration des variables  */

var map;

function initMap() {

    var latlng = new google.maps.LatLng(43.295309, 5.374457);
    var mapOptions = {
        zoom: 14,
        center: latlng
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

/*function getAddress() {
    $.ajax({
        type: 'GET',
        url: "{{path('handissimo_ajax')}}",
        async: "true",
        dataType: "json",
        contentType: 'application/json',
        success: geocodeAddress()
    });
}*/


    var contentString = '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<h6 id="firstHeading" class="firstHeading">{{organizations.name}}</h6>' +
                '<div id="bodyContent">' +
                '<p>{{ organizations.adress }}</p>' +
                '<p>{{ organizations.postal }}</p>' +
                '<p>c</p>' +
                '<p>{{organizations.organizationPhoneNumber}}</p>' +
                '<p>{{organizations.openhours}}</p>' +
                '</div>' +
                '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    })
}






