var myApp = myApp || {};

myApp.utils = (function (utils) {
    'use strict';
    utils.stringCaseInsensitiveEquals = function (a, b) {
        if (!isNaN(a) && !isNaN(b)) {
            return "please enter a string";
        }
        return a.toUpperCase() === b.toUpperCase();
    };

    return utils;

})(myApp.utils || {});