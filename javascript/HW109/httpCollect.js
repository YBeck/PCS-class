(function() {
  "use strict";
  const http = require("http");

  http.get(process.argv[2], response => {
    let length = 0;
    let print = "";
    response.setEncoding("utf-8");
    response.on("data", data => {
      length += data.length;
      print += data;
    });

    response.on("end", () => {
      console.log(length);
      console.log(print);
    });

    response.on("error", err => {
      console.log(err.message);
    });
  });
})();
