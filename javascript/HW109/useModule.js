const myModule = require("./myModule");

myModule(process.argv[2], process.argv[3], (err, response) => {
  "use strict";
  if (err) {
    console.log(err);
  } else {
    response.forEach(element => {
      console.log(element);
    });
  }
});
