import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import Recipe from "./Recipe";
import registerServiceWorker from "./registerServiceWorker";
import { BrowserRouter, Route } from "react-router-dom";

ReactDOM.render(
  <BrowserRouter>
    <div>
      <Route exact path="/" component={Recipe} />
    </div>
  </BrowserRouter>,
  //   <Recipe />,
  document.getElementById("root")
);
registerServiceWorker();
