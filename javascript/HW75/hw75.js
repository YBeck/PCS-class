function isUpperCase(letter) {
    return letter === letter.toUpperCase();
}

var letters = ['a', 'B', 'c', 'D'];
var lower = ['a', 'b', 'c', 'd'];
var upper = ['A', 'B', 'C', 'D'];

function ourSome(arr, callback) {
    for (var i = 0; i < arr.length; i++) {
        if (callback(arr[i])) {
            return true;
        }     
    }
    return false;
}

console.log('ourSome someUpper', ourSome(letters, isUpperCase));
console.log('ourSome lowerOnly', ourSome(lower, isUpperCase));
console.log('ourSome someLower', ourSome(letters, function (letter) {
    return !isUpperCase(letter);
}));

console.log('ourSome upperOnly', ourSome(upper, function (letter) {
    return !isUpperCase(letter);
}));

console.log('some someUpper', letters.some(isUpperCase));
console.log('some lowerOnly', lower.some(isUpperCase));

console.log('some lowerOnly', lower.some(function (letter) {
    return !isUpperCase(letter);
}));

console.log('some upperOnly', upper.some(function (letter) {
    return !isUpperCase(letter);
}));

function print(element) {
    console.log('onlyIf', element);
}

function onlyIf(arr, test, action) {  //print out upper case only
    for (var i=0; i<arr.length; i++){
        if (test(arr[i])) {  // isUpperCase()
            action(arr[i]); // print()
        }
    }
}

onlyIf(letters, isUpperCase, print);
onlyIf(lower, isUpperCase, print);
onlyIf(upper, isUpperCase, print);