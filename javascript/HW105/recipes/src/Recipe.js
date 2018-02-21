import React, { Component } from "react";
import RecipeDetails from "./Recipe_details";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Switch from "react-router-dom/Switch";

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
      selectedRecipe: {
        id: "",
        name: "",
        instructions: "",
        img: ""
      }
    };
    this.handelSelect = this.handelSelect.bind(this);
  }

  handelSelect(theId) {
    const { id, name, instructions, img } = this.state.recipe.find(
      elem => elem.id === theId
    );
    // console.log(name);
    this.setState({
      selectedRecipe: {
        id: id,
        name: name,
        instructions: instructions,
        img: img
      }
    });
    // console.log("the selected is ", this.state.selectedRecipe);
    // return <RecipeDetails selectedRecipe={this.state.selectedRecipe} />;
  }

  render() {
    const { recipe } = this.state;
    const diplayRecipes = recipe.map(rec => {
      return (
        <div key={rec.id}>
          <ul>
            <li>
              <h2 onClick={() => this.handelSelect(rec.id)}>{rec.name}</h2>
              <img src={rec.img} alt="" />
            </li>
          </ul>
        </div>
      );
    });
    return (
      <Router>
        <div>
          <Link to="/details">{diplayRecipes}</Link>
          {/* <Route
            exact
            path="/details"
            component={() => (
              <RecipeDetails selectedRecipe={this.state.selectedRecipe} />
            )}
          /> */}
          <Switch>
            <Route
              exact
              path="/details"
              render={() => (
                <RecipeDetails selectedRecipe={this.state.selectedRecipe} />
              )}
            />
            {/* // selectedRecipe={this.state.selectedRecipe} */}
            {/* <Route exact path="/" component={Recipe} /> */}
          </Switch>

          {/* <RecipeDetails selectedRecipe={this.state.selectedRecipe} /> */}
        </div>
      </Router>
    );
  }
}
