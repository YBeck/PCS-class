var app = app || {};

app.count = (function (count) {
    "use strict";
    var counter = 0;

    count.increment = function () {
        counter++;
        return this;
    };

    count.getCount = function () {
        return counter;
    };

    return count;

}(app.count || {}));