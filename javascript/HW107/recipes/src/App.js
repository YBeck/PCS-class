import React, { Component } from "react";
import "./index.css";
import { Route, Switch, Link } from "react-router-dom";
import Recipe from "./Recipe";

export default class App extends Component {
  render() {
    return (
      <div>
        <h1 className="header">PCS Recipies</h1>
        <Link to="/">Home</Link> | <Link to="/display">Display Recipes</Link>
        <Switch>
          <Route path="/display" component={Recipe} />
        </Switch>
      </div>
    );
  }
}
