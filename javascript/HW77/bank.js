"use strict";
var bank1 = {
    balance: 100
};

var bank2 = {
    balance: 200
};

function addInterest( interest) {
    this.balance = this.balance + (interest / 100);
}

addInterest.call(bank1, 10);
console.log("bank1", bank1.balance);
addInterest.apply(bank2, [70]);
console.log("bank2", bank2.balance);