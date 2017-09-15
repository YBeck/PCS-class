alert(name);

function greaterThan(a, b) {
    if (!isNaN(a) && !isNaN(b)) {
        if (a > b) {
            return true;
        } else {
            return false;
        }
    } else {
        alert("Only numbers please");
    }
}

console.log('y, 5', greaterThan("y", 5));
console.log('"5", 5', greaterThan("5", 5));
console.log('5, 5', greaterThan(5, 5));
console.log('6, 5', greaterThan(6, 5));
console.log('"6", 5', greaterThan("6", 5));








