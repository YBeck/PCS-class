const fs = require("fs");
const path = require("path");

fs.readdir(process.argv[2], (err, files) => {
  if (err) {
    throw err;
  }
  const filtered = files.filter(
    element => path.extname(element) === `.${process.argv[3]}`
  );
  filtered.forEach(element => {
    console.log(element);
  });
});
