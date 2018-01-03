
/*global google, $, */
function initMap(){
    'use strict';
    var lat = 40.087528;
    var lng = -74.208183;
    var markers = [];
    var location = {
        lat: lat,
        lng: lng
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 8
    });

    $('form').on('submit', function (event) {
        event.preventDefault();
        var searched = $('#search').val();
        $.getJSON('http://api.geonames.org/wikipediaSearch?callback=?', {
            q: searched,
            username: 'ybeck',
            type: 'json'
        }, function (result) {
            // console.log(result.geonames);
            var bounds = new google.maps.LatLngBounds();
            $.each(result.geonames, function (index, ret) {
                //console.log(ret);
                var newLocation = {
                    lat: ret.lat,
                    lng: ret.lng
                };
                // location.lat = ret.lat;
                // location.lng = ret.lng;
                    var marker = new google.maps.Marker({
                    position: newLocation,
                    map: map,
                    icon: ret.thumbnailImg ? {
                    url: ret.thumbnailImg,
                    scaledSize: new google.maps.Size(50, 50)
                    } : null
                });
                var infowindow = new google.maps.InfoWindow();
                marker.addListener('click', function () {
                    infowindow.setContent(ret.summary + '<br><a target="_blank" href="http://' + ret.wikipediaUrl + '">Wikipedia</a>');
                    infowindow.open( map, marker);
                });
                markers.push(marker);
                bounds.extend(newLocation);
                $('<li class="list-group-item">' +
                    '<img src="' + (ret.thumbnailImg ||  'images/image.png') + '" class="img-thumbnail">' +
                    ret.title + '</li > ').appendTo($('#ul')).click(function (e) {
                        console.log(e);
                        map.panTo(newLocation);
                        map.setZoom(15);
                    });
            });
            map.fitBounds(bounds);

        });
    });
    $('#clear').click(function (event) {
        event.preventDefault();
        markers.forEach(function (e) {
            //console.log(e);
            e.setMap(null);
        });
        markers = [];
    });

    var drawingManager = new google.maps.drawing.DrawingManager();
    drawingManager.setMap(map);
}
    




