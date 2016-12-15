function initMap() {
    var uluru = {lat: 45.764043, lng: 4.835658999999964};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: uluru
    });



    $.ajax({
        type: "POST",
        url: "/research/ajaxmarker/",
        dataType: 'json',
        timeout: 3000,
        success: function (response) {
            var coordonnate = JSON.parse(response.result);
            console.log(coordonnate);
            for (var i = 0; i < coordonnate.length; i++) {


                var contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h1 id="firstHeading" class="firstHeading">' + coordonnate[i].name + '</h1>' +
                    '<div id="bodyContent">' +
                    '<p>' + coordonnate[i].address + '<br>' +
                    //coordonnate[i].postal + '<br>' +
                    coordonnate[i].city + '<br>' +
                    //coordonnate[i].phoneNumber + '<br>' +
                    //coordonnate[i].mail + '<br>' +
                    '</p>' +
                    '</div>' +
                    '</div>';


                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 200
                });
                var localisation = {lat: coordonnate[i].latitude, lng: coordonnate[i].longitude}
                var marker = new google.maps.Marker({

                    position: localisation,
                    map: map,
                    title: 'Uluru (Ayers Rock)'
                });
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }
        }

    })

}





