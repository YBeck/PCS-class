var app = app || {};

app.count = (function (count) {
    "use strict";
    var numOfCounters = 0;
    var theCounter = 0;
    count.counters = function () {
        return {
            newCounter: function () {
                theCounter = 0;
                console.log(++numOfCounters + " were created");
                return this;
            },
            increment: function () {
                theCounter++;
                return this;
            },
            getCount: function () {
                return theCounter;
            }
        };
    };
    return count;
}(app.count || {}));