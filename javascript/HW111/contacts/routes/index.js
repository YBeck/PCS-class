var express = require("express");
var router = express.Router();

/* GET home page. */
let contacts = [
  {
    first_name: "Donald",
    last_name: "Trump",
    email: "dtrump@whitehouse.gov",
    phone: "232-434-6555"
  },
  {
    first_name: "Mike",
    last_name: "Pence",
    email: "mpence@whitehouse.gov",
    phone: "232-434-6533"
  },
  {
    first_name: "Jerrad",
    last_name: "Kushner",
    email: "jkush@whitehouse.gov",
    phone: "232-434-6599"
  }
];

// router.all("/", (req, res, next) => {
//   res.setHeader("Content-Type: text/HTML");
//   next();
// });
router.all("/", (req, res, next) => {
  res.send("<h1>PCS contacts</h1>");
  next();
});

router.get("/contacts", function(req, res, next) {
  res.render("index", { contacts: contacts });
  next();
});
router.get("/add", function(req, res, next) {
  res.render("form");
  next();
});

router.post("/contacts", (req, res, next) => {
  // res.send(req.body.fname);
  if (req.body) {
    let newContact = {
      first_name: req.body.fname,
      last_name: req.body.lname,
      email: req.body.email,
      phone: req.body.phone
    };
    contacts.push(newContact);
    res.render("index", { contacts: contacts });
    next();
  } else {
    res.send("please enter a valid name");
  }
});

module.exports = router;
