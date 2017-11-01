(function () {
    "use strict";
    window.onload = function () {
        var theJumbotron = document.getElementById("jumbotron");
        var theH1 = document.getElementById("theH1");
        var choose = document.getElementById("choose");
        choose.addEventListener('click', function () {
            var fontColor = document.getElementById('fontColor').value;
            var backgroundColor = document.getElementById('backgroundColor').value;
            theJumbotron.style.backgroundColor = backgroundColor;
            theH1.style.color = fontColor;
        });
        
    };
}());