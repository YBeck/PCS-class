import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import Recipe from "./Recipe";
import registerServiceWorker from "./registerServiceWorker";
import { BrowserRouter as Router, Route } from "react-router-dom";

ReactDOM.render(
  <Router>
    <div>
      <Route exact path="/" component={Recipe} />
    </div>
  </Router>,
  //   <Recipe />,
  document.getElementById("root")
);
registerServiceWorker();
