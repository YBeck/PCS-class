const url = require("url");
module.exports = (req, res, next) => {
  "use strict";
  const theUrl = url.parse(req.url, true);
  console.log(theUrl);
  req.path = theUrl.path;
  req.query = theUrl.query;
  next();
};
