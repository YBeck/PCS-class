import React, { Component } from "react";
import PropTypes from "prop-types";
import RecipeDetails from "./Recipe_details";

export default class DisplayRecipes extends Component {
  constructor(props) {
    super(props);
    this.state = {
      showDetails: false,
      hover: false
    };
  }

  diplayDetails = () => {
    const { showDetails } = this.state;
    this.setState({ showDetails: !showDetails });
  };

  toggleHover = () => {
    const { hover } = this.state;
    this.setState({
      hover: !hover
    });
  };

  backgroundStyle = () => {
    return {
      background: "yellow"
    };
  };
  render() {
    const recipe = this.props.recipe;
    const { showDetails, hover } = this.state;

    return (
      <div>
        <h2>{recipe.name}</h2>
        {showDetails ? <RecipeDetails recipe={recipe} /> : null}
        <button
          onClick={this.diplayDetails}
          onMouseEnter={this.toggleHover}
          onMouseLeave={this.toggleHover}
          style={hover ? this.backgroundStyle() : null}
        >
          click to {showDetails ? " to hide" : " show more"}
        </button>
      </div>
    );
  }
}

DisplayRecipes.propTypes = {
  recipe: PropTypes.object
};
