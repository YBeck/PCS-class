import React, { Component } from "react";
import DisplayRecipes from "./DisplayRecipes";
import AddRecipe from "./AddRecipe";
import { Route, Link } from "react-router-dom";
import "./index.css";

export default class Recipe extends Component {
  constructor(props) {
    super(props);
    this.state = {
      recipe: [
        {
          id: 1,
          name: "challah",
          instructions: "how ever your wife likes to make it",
          img: "./images/challah.jpg"
        },
        {
          id: 2,
          name: "latkes",
          instructions: "fry in oil until its brown",
          img: "./images/latkes.jpg"
        },
        {
          id: 3,
          name: "lomain",
          instructions: "cook spaghetti then bake with chicken",
          img: "./images/lomain.jpg"
        },
        {
          id: 4,
          name: "pizza",
          instructions: "combine all ing. and bake",
          img: "./images/pizza.jpg"
        }
      ]
    };

    this.addRecipe = this.addRecipe.bind(this);
  }

  addRecipe(rec) {
    const { recipe } = this.state;
    const newRecipe = [...recipe, rec];
    this.setState({ recipe: newRecipe });
  }

  render() {
    const url = this.props.match.url;
    const { recipe } = this.state;
    const renderRecipe = recipe.map(rec => (
      <li key={rec.id}>
        <DisplayRecipes recipe={rec} />
      </li>
    ));

    return (
      <div>
        <ul>{renderRecipe}</ul>
        <Link to={`${url}/add`}>Add Recipe</Link>
        <Route
          path={`${url}/add`}
          render={() => <AddRecipe addRecipe={this.addRecipe} />}
        />
      </div>
    );
  }
}
