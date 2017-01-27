
function initMap() {
    var uluru = {lat: 45.764043, lng: 4.835658999999964};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: uluru
    });

    var coordinate = document.getElementsByClassName('arrayjson');
    for (var i = 0; i < coordinate.length; i++) {
        (function (index) {
            var elements = JSON.parse(coordinate[i].value);
            var localisation = {lat: elements.latitude, lng: elements.longitude};
            var marker = new google.maps.Marker({
                position:localisation,
                map: map

            });

        })(i);
    }

}

