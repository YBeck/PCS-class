(function () {
    "use strict";
    var body = document.body;
    var rgb = getRgb();
    var i = 0;
    var j = rgb.length;
    var theButton = document.getElementById('theButton');
    theButton.innerText = 'Start';
    var intervalId;

    function getRgb() {
        var rgbArr = [];
        for (var i = 0; i < 255; i++) {
            for (var j = 0; j < 255; j++) {
                for (var k = 0; k < 255; k++) {
                    rgbArr.push("rgb(" + i + "," + j + "," + k + ")");
                }
            }
        }
        return rgbArr;
    }

    function setColor() {
        body.style.backgroundColor = rgb[i] + "";
        body.style.color = rgb[j];
        i++;
        j--;
    }

    theButton.addEventListener('click', function () {
        if (!intervalId) {
            intervalId = setInterval(setColor, 100);
            theButton.innerText = 'Stop';
        } else {
            clearInterval(intervalId);
            intervalId = null;
            theButton.innerText = 'Start';
        }
    });

})();