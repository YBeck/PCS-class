const fs = require("fs");

function getAmount(callback) {
  fs.readFile(process.argv[2], (err, data) => {
    if (err) {
      throw err;
    }
    const fileContents = data.toString();
    const amount = fileContents.split("\n").length - 1;
    callback(amount);
  });
}
function print(amount) {
  console.log(amount);
}

getAmount(print);
