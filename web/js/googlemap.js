
function initMap() {
    var uluru = {lat: 45.764043, lng: 4.835658999999964};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: uluru
    });

    //Resize Function
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
    var zoomChangeBoundsListener = google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
        map.setZoom( Math.min( 11, map.getZoom() ) );
    });
    var bounds = new google.maps.LatLngBounds();

    var coordinate =  document.getElementsByClassName('arrayjson');
    for(var i = 0; i < coordinate.length; i++) {
        (function(index){
            var elements = JSON.parse( coordinate[i].value );
            var locId = elements.id;
            var url = Routing.generate('structure_page', { id: locId });
            var contentString = '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<a href= "'+url+'" class="link-about"><h3 id="firstHeading" class="firstHeading">' + elements.name + '</h3></a>' +
                '<div id="bodyContent">' +
                '<p>' + elements.address + '<br>' +
                elements.postal + '<br>' +
                elements.city + '<br>' +
                elements.number + '<br>' +
                elements.mail + '<br>' +
                '</p>' +
                '</div>' +
                '</div>';
            var infoWindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 200
            });
            var localisation = {lat: elements.latitude, lng: elements.longitude};
            var marker = new google.maps.Marker({

                position: localisation,
                map: map,
                title: elements.name
            });
            bounds.extend(localisation);

            // add function for close infowindow marker when another windows opens
            google.maps.event.addListener(marker, 'click', function () {
                if (typeof(window.infoopened) != 'undefined') infoopened.close();
                infoWindow.open(map, marker);
                infoopened = infoWindow;
            });
        })(i);
    }
    map.fitBounds(bounds);
}