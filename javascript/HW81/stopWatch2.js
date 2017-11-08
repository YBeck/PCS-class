(function () {
    "use strict";

    var outerDiv = createElement('div');
    var span = createElement('span');
    var buttonDiv = createElement('div');
    var startStopButton = createElement('button');
    var resetButton = createElement('button');
    var startTime;
    var endTime = 0;
    var milliseconds;
    var pausedAt = 0;
    var intervalId = null;

    buttonDiv.appendChild(startStopButton);
    buttonDiv.appendChild(resetButton);
    outerDiv.appendChild(span);
    outerDiv.appendChild(buttonDiv);
    document.body.appendChild(outerDiv);
    span.innerText = "00:00:00:00000";
    startStopButton.innerText = "Start";
    resetButton.innerText = "Reset";

    outerDiv.style.position = "absolute";
    outerDiv.style.display = "inline - block";
    outerDiv.style.width = "350px";
    outerDiv.style.height = "100px";
    outerDiv.style.backgroundColor = "black";
    outerDiv.style.top = "50%";
    outerDiv.style.left = "50%";
    outerDiv.style.marginTop = "-50px";
    outerDiv.style.marginLeft = "-175px";

    buttonDiv.style.display = "inline - flex";
    buttonDiv.style.width = "105px";
    buttonDiv.style.position = "absolute";
    buttonDiv.style.bottom = "7px";
    buttonDiv.style.justifyContent = "space - between";
    buttonDiv.style.display = "inline - block";
    buttonDiv.style.left = "50%";
    buttonDiv.style.marginLeft = "-52px";

    startStopButton.style.marginRight = "5px";
    startStopButton.style.borderRadius = "4px";
    startStopButton.style.backgroundColor = "yellowgreen";

    resetButton.style.borderRadius = "4px";
    resetButton.style.backgroundColor = "yellowgreen";

    span.style.color = "greenyellow";
    span.style.position = "absolute";
    span.style.top = "20%";
    span.style.width = "80%";
    span.style.margin = "0 auto";
    span.style.left = "0";
    span.style.right = "0";
    span.style.textAlign = "center";
    span.style.fontSize = "2.5em";

    function createElement(element) {
        return document.createElement(element);
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

        span.innerText = formatNumber("hour", hour) + ":" + formatNumber("min", min) + ":" +
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
        span.innerText = "00:00:00:00000";
        pausedAt = 0;
    });

})();