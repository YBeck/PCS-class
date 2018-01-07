/*global $ */
// (function () {
//     'use strict';

//     var dragging;
//     var offset;
//     var zIndex = 0;
//     $(document).on('mousedown', '.dragable', function (event) {
//         //console.log(event);
//         dragging = $(this);
//         //console.log(dragging);
//         offset = { y: event.offsetY, x: event.offsetX };
//         dragging.css('zIndex', ++zIndex);
//     }).on('mouseup', '.dragable', function () {
//         dragging = null;
//         console.log(dragging);
//     }).on('mousemove', function (event) {
//         if (dragging) {
//             dragging.css({ top: event.clientY - offset.y, left: event.clientX - offset.x });
//         }
//     });
// })();

(function () {
    'use strict';
    var zIndex = 0;
    $(function () {
        $(".ui-widget-content").draggable({ stack: "div" });
       // $(".ui-widget-content").draggable("option", "zIndex", ++zIndex);
    });
})();