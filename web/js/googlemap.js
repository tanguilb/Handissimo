function initMap() {
    var uluru = {lat: 45.764043, lng: 4.835658999999964};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: uluru
    });

    $.ajax({
        type: "POST",
        url: "{{ path(handissimo_search) }}",
        dataType: 'json',
        timeout: 3000,
        success: function(response){
            var coordonnate = JSON.parse(response.data)
        }
    })

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">TestTitre</h1>'+
        '<div id="bodyContent">'+
        '<p>TestAdresse<br>'+
        'TestCodePostal<br>'+
        'TestVille<br>'+
        'TestTelephone<br>'+
        'TestMail<br>'+
        '</p>'+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 200
    });

    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        title: 'Uluru (Ayers Rock)'
    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
}






