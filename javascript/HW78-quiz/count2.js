var app = app || {};

app.counters = (function (counter) {
    "use strict";
    var numOfCounters = 0;
    counter.newCounter = function() {
        console.log("creating counter number " + (++numOfCounters));
        var theCounter = 0;
        return {
            increment: function () {
                theCounter++;
                return this;
            },
            getCount: function () {
                return theCounter;
            }
        };
    };
    return counter;
}(app.counters || {}));



