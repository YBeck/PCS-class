module.exports = (req, res, next) => {
  "use strict";
  //   console.log(req.Url.query);
  if (req.query.magicWord === "please") {
    next();
  } else {
    const err = new Error(`sorry access denided`);
    next(err);
  }
};
