(function() {
  "use strict";
  const http = require("http");

  http.get(process.argv[2], response => {
    let print = "";
    response.setEncoding("utf-8");
    response.on("data", data => {
      print += data;
    });

    response.on("end", () => {
      console.log(print);
      second();
    });

    response.on("error", err => {
      console.log(err.message);
    });
  });

  const second = () => {
    http.get(process.argv[3], response => {
      let print = "";
      response.setEncoding("utf-8");
      response.on("data", data => {
        print += data;
      });

      response.on("end", () => {
        console.log(print);
        third();
      });

      response.on("error", err => {
        console.log(err.message);
      });
    });
  };

  const third = () => {
    http.get(process.argv[4], response => {
      let print = "";
      response.setEncoding("utf-8");
      response.on("data", data => {
        print += data;
      });

      response.on("end", () => {
        console.log(print);
      });

      response.on("error", err => {
        console.log(err.message);
      });
    });
  };
})();
