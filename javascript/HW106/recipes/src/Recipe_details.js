import React, { Component } from "react";
import PropTypes from "prop-types";

export default class RecipeDetails extends Component {
  render() {
    const { name, instructions, img } = this.props.recipe;

    return (
      <div>
        <h2> Recipe details for {name}</h2>
        <ul>
          <li>
            Instructions: <p>{instructions}</p>
            <img src={img} alt="" />
          </li>
        </ul>
      </div>
    );
  }
}
RecipeDetails.propTypes = {
  name: PropTypes.string,
  instructions: PropTypes.string,
  img: PropTypes.string,
  recipe: PropTypes.object
};
