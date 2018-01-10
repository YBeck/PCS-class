/*global $ */
(function () {
    'use strict';

    var dragging;
    var offset;
    var zIndex = 0;
    $(document).on('mousedown', '.draggable', function (event) {
        event.preventDefault();
        //console.log(event);
        dragging = $(this);
        //console.log(dragging);
        offset = { y: event.offsetY, x: event.offsetX };
        dragging.css('zIndex', ++zIndex);
    }).on('mouseup',function () {
        event.preventDefault();
        dragging = null;
        //console.log(dragging);
        }).on('mousemove', function (event) {
            event.preventDefault();
        if (dragging) {
            dragging.css({ top: event.pageY - offset.y, left: event.pageX - offset.x });
            // console.log(dragging.find('img'));
            // console.log('the part top: ', dragging.css('top'), 'left: ', dragging.css('left'));
            // console.log('the event top: ', event.clientY - offset.y, 'left: ', event.clientX - offset.x);
        }
    });
})();