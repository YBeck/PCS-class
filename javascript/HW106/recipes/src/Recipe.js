import React, { Component } from "react";
import DisplayRecipes from "./DisplayRecipes";
import AddRecipe from "./AddRecipe";
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
      ],
      showForm: false
    };

    this.addRecipe = this.addRecipe.bind(this);
    this.displayForm = this.displayForm.bind(this);
  }

  addRecipe(rec) {
    const { recipe } = this.state;
    recipe.push(rec);
    this.setState({ recipe: recipe });
  }

  displayForm() {
    const { showForm } = this.state;
    this.setState({ showForm: !showForm });
  }

  render() {
    const { recipe, showForm } = this.state;
    const renderRecipe = recipe.map(rec => (
      <li key={rec.id}>
        <DisplayRecipes recipe={rec} />
      </li>
    ));

    return (
      <div>
        <ul>{renderRecipe}</ul>
        {showForm ? (
          <AddRecipe
            addRecipe={this.addRecipe}
            displayForm={this.displayForm}
          />
        ) : null}
        <button onClick={this.displayForm}>
          {showForm ? "Hide Form" : "Add Recipe"}
        </button>
      </div>
    );
  }
}
