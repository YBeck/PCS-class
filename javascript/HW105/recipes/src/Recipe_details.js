import React, { Component } from "react";
import { BrowserRouter as Router, Link } from "react-router-dom";

export default class RecipeDetails extends Component {
  render() {
    const { name, instructions, img } = this.props.selectedRecipe;

    return (
      <div>
        <h2> Recipe details for {name}</h2>
        <ul>
          <li>
            Instructions: <p>{instructions}</p>
            <img src={img} alt="" />
          </li>
        </ul>
        <Router>
          <Link to="/">Home</Link>
        </Router>
      </div>
    );
  }
}
