const fs = require("fs");
const path = require("path");

module.exports = function readFile(dir, fileExt, callback) {
  "use strict";
  fs.readdir(dir, (err, files) => {
    if (err) {
      return callback(err);
    }
    const filtered = files.filter(
      element => path.extname(element) === `.${fileExt}`
    );
    return callback(null, filtered);
  });
};
