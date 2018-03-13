(function() {
  "use strict";
  const connect = require("connect")();

  connect.use((req, res, next) => {
    res.setHeader("Content-Type", "text/html");
    next();
  });

  connect.use(require("./queryParser"));
  connect.use(require("./authentication"));

  connect.use("/home", (req, res) => {
    res.end("<h2>Wlcome to our homepage</h2>");
  });

  connect.use("/name", (req, res) => {
    res.end(`<h2>Wlcome to our site ${req.query.name}</h2>`);
  });

  connect.use("/about", (req, res) => {
    res.end(`<h2>About us</h2></br><p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Aspernatur, omnis unde commodi obcaecati ipsum voluptate eveniet harum illum nisi 
            libero. At ex, maxime aliquam vitae, optio sed repudiandae neque
            distinctio voluptate minus, amet alias quam nisi error. 
            Exercitationem explicabo deleniti, dignissimos eos assumenda 
            quam sint voluptas reiciendis cumque officiis voluptatem 
            accusantium ut. Enim, hic voluptatibus ratione consequatur 
            impedit corrupti dolor, nisi unde officiis iure laudantium 
            illum sequi voluptates nihil sapiente consequuntur facere a 
            repudiandae excepturi nam inventore fugit doloremque velit quas. 
            Sint architecto, ipsam numquam labore dolores itaque nemo dolorum, 
            assumenda odio aperiam, vero eum repellat nihil sunt dolorem veritatis!
        </p>`);
  });

  connect.use("/feedback", (req, res) => {
    res.end(`
            <textarea></textarea>
            <button>submit</button>
        `);
  });

  connect.use((req, res, next) => {
    const error = new Error(
      "<h2 style='color:red'>Unable to find page: 404</h2>"
    );
    next(error);
  });

  connect.use((err, req, res, next) => {
    res.end(`something went wrong ${err.message}`);
    next();
  });

  connect.listen(80);
})();
