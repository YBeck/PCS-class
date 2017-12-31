
/*global google, $, */
(function () {
    'use strict';
    var lat = 40.087528;
    var lng = -74.208183;
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
            $.each(result.geonames, function (index, ret) {
                //console.log(ret);
                location.lat = ret.lat;
                location.lng = ret.lng;
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            });

        });
    });
}());
    




