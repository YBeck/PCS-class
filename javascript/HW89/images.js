/*global $ */
(function () {
    "use strict";
    var slideShow = $('#slide');
    var index = 0;
    var interval = null;
    
    function setAttributes(json, index) {
        $('#title').text(json[index].title);
        $('#img').attr('src', json[index].url);
    }
    $.get('images.json', function (images) {
        //console.log(images);
        setAttributes(images, index);

        $('#next').click(function () {
            index++;
            if (index === images.length) {
                index = 0;
            }
            setAttributes(images, index);
        });

        $('#prev').click(function () {
            index--;
            if (index < 0) {
                index = images.length -1;
            }
            setAttributes(images, index);
        });
        
        slideShow.click(function () {
            if (!interval) { 
                slideShow.text('Stop Slideshow');
                interval = setInterval(function () {
                    index++;
                    if (index === images.length) {
                        index = 0;
                    }
                    setAttributes(images, index);
                }, 2000);
            } else {
                clearInterval(interval);
                interval = null;
                slideShow.text('Start Slideshow');
            }
        });
    });
})();