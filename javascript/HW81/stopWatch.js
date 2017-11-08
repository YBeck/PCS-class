(function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function formatNumber(type, number) {
        var strNum = number.toString();
        if (type !== "millisecond") {
            if (strNum.length === 2) {
                return number;
            }
        } else {
            if (strNum.length === 5) {
                return number;
            } else if (strNum.length === 3) {
                return "00" + number;
            }
        }
        return "0" + strNum;
    }

    var startTime;
    var endTime = 0;
    var milliseconds;
    var pausedAt = 0;
    var startStopButton = get('startStopButton');
    var resetButton = get('resetButton');
    var timeSpan = get('timeSpan');
    var intervalId = null;
    startStopButton.innerText = "Start";

    function calculateTime() {
        endTime = new Date();

        var timer = endTime - startTime;
        milliseconds = timer + pausedAt;
        var seconds = Math.floor(milliseconds / 1000);
        var min = Math.floor(seconds / 60);
        var hour = Math.floor(min / 60);

        if (seconds > 59) {
            seconds = seconds % 60;
        }

        if (min > 59) {
            min = min % 60;
        }

        timeSpan.innerText = formatNumber("hour", hour) + ":" + formatNumber("min", min) + ":" +
            formatNumber("second", seconds) + ":" + formatNumber("millisecond", milliseconds);
    }

    startStopButton.addEventListener('click', function () {
        if (!intervalId) {
            startTime = new Date();
            intervalId = setInterval(calculateTime, 1);
            startStopButton.innerText = "Stop";
        } else {
            startStopButton.innerText = "Start";
            clearInterval(intervalId);
            pausedAt = milliseconds;
            intervalId = null;

        }
    });

    resetButton.addEventListener('click', function () {
        timeSpan.innerText = "00:00:00:00000";
        pausedAt = 0;
    });



})();