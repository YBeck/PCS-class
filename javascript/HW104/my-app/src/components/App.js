import React, { Component } from "react";
import "./App.css";
import Student from "./Student";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      student: [
        { name: "Donald Trump", marks: [90, 91, 95] },
        { name: "Mike Pence", marks: [95, 93, 98] },
        { name: "Hillary Clinton", marks: [80, 91, 85] }
      ]
    };
  }

  render() {
    return (
      <div>
        <h1>Homework 104</h1>
        {this.state.student.map(element => {
          return (
            <Student
              name={element.name}
              marks={element.marks}
              key={element.name}
            />
          );
        })}
      </div>
    );
  }
}

export default App;
