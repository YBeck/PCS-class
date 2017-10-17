var monthName = (function () {
    'use strict';
    var months = ['January', 'February', 'March', 'April', 'May',
        'June', 'July', 'August', 'September', 'October',
        'November', 'December'];

    function getMonthName(number) {
        return months[number - 1];
    }

    function getMonthNumber(name) {
        for (var i = 0; i < months.length; i++) {
            if (months[i] === name) {
                return i + 1;
            }
        }
    }

    return {
        getMonthName: getMonthName,
        getMonthNumber: getMonthNumber
    };

})();

console.log("getMonthName", monthName.getMonthName(2));
console.log("getMonthNumber", monthName.getMonthNumber('March'));

var interestCalculator = (function () {
    'use strict';
    function setYears(years) {
        return years;
    }
    function setInterest(interest) {
        return interest / 100;
    }

    return {
        calculateInterest: function (number, years, interest) {
            return number * setInterest(interest) * setYears(years);
        }
    };
})();

console.log('interestCalculator', interestCalculator.calculateInterest(250000, 30, 2.5));

