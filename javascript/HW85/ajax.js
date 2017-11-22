/*global $ */
(function () {
    'use strict';
    var load = $('button');
    var urlInput = $('#urlInput');
    var artical = $('artical');
    load.click(function () {
        $('body').append('<div class="text-center"><img src="images/Spinner.png"></div>');
        setTimeout(function () {
            $.get(urlInput.val(), function (url) {
           //$('body').append('<artical>' + url + '</artical>');
                artical.text(url);
            }).fail(function (hxr) {
                artical.addClass("bg-danger text-white").text(hxr.status + " " + hxr.statusText);
                });
            $('div img').hide();
        }, 2000);
        

    });

})();