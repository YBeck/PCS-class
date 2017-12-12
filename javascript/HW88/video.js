/*global $ */
(function () {
    'use strict';
    var container = $('#container');
    $.getJSON('video.json', function (vid) {
        $.each(vid, function (index, value) {
            $('<ul class="list-group">' +
                '<li class="list-group-item"> Title: ' + value.title + 'Url: ' + '  ' + value.url +
                '</li></ul>').appendTo(container).click(function (event) {
                    $('video').attr('src', value.url).show()[0].play();
                    console.log(event);
                });
        });
    });
})();