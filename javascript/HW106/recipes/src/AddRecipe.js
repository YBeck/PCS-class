import React, { Component } from "react";
import PropTypes from "prop-types";

export default class AddRecipe extends Component {
  constructor(props) {
    super(props);
    this.state = {
      id: "",
      name: "",
      instructions: "",
      img: ""
    };

    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleInputChange(event) {
    const target = event.target;
    const value = target.type === "checkbox" ? target.checked : target.value;
    const name = target.name;

    this.setState({
      [name]: value
    });
  }

  handleSubmit(event) {
    event.preventDefault();
    this.props.displayForm();
    this.props.addRecipe(this.state);
  }

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <label>
            Id:
            <input
              type="text"
              name="id"
              onChange={this.handleInputChange}
              value={this.state.id}
            />
          </label>
          <label>
            Name:
            <input
              type="text"
              name="name"
              onChange={this.handleInputChange}
              value={this.state.name}
            />
          </label>
          <label>
            Instructions:
            <textarea
              name="instructions"
              onChange={this.handleInputChange}
              value={this.state.instructions}
            />
          </label>
          <label>
            Image:
            <input
              type="text"
              name="img"
              onChange={this.handleInputChange}
              value={this.state.img}
            />
          </label>
          <input type="submit" value="Submit" />
        </form>
      </div>
    );
  }
}

AddRecipe.propTypes = {
  addRecipe: PropTypes.func,
  displayForm: PropTypes.func
};
