import React, { Component } from "react";

class Student extends Component {
  render() {
    const name = this.props.name;
    const marks = this.props.marks;

    return (
      <ul>
        <li>
          <h2>{name}</h2>
        </li>
        <ul>
          {marks.map(marks => {
            return <li key={marks.toString()}>{marks}</li>;
          })}
        </ul>
      </ul>
    );
  }
}

export default Student;
