var originalArray = [2, 4, 6];

function ourMap(arr, callback) {
    "use strict";
    var retArray = [];
    arr.forEach(function (element) {
        retArray.push(callback(element));
    });
    return retArray;
}

function double(num) {
    "use strict";
    return num * 2;
}
console.log("array.map");
console.log("original array", originalArray, "ourMap", ourMap(originalArray, double));
