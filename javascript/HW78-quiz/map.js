var originalArray = [2, 4, 6];

function ourMap(arr) {
    "use strict";
    var retArray = [];
    arr.forEach(function (element) {
        retArray.push(element * 2);
    });
    return retArray;
}
console.log("array.map");
console.log("original array", originalArray, "ourMap", ourMap(originalArray));
