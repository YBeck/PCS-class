const fs = require("fs");

const fileContents = fs.readFileSync(process.argv[2]).toString();
const amount = fileContents.split("\n").length - 1;
console.log(amount);
