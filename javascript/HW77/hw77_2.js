var myApp = myApp || {};

myApp.utils = (function (utils) {
    'use strict';
    utils.stringCaseInsensitiveEquals = function (a, b) {
        return a.toUpperCase() === b.toUpperCase() && isNaN(a) && isNaN(b);
    };

    return utils;

})(myApp.utils || {});