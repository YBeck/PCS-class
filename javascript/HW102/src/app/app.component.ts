import { Component } from "@angular/core";
import { NgbModule } from "@ng-bootstrap/ng-bootstrap";
import { Blog } from "./shared/blogs";
import { Post } from "./shared/posts";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  title = "Homework 102";
  users = [
    { name: "Donald Trump", company: "White House" },
    { name: "Mike Pence", company: "White House" },
    { name: "Hillary Clinton", company: "unemployed" }
  ];
  blogs: Blog[] = [
    {
      name: "first",
      body:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis.",
      post: [
        {
          name: "post1",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post2",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post3",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        }
      ]
    },
    {
      name: "second",
      body:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis.",
      post: [
        {
          name: "post1",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post2",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post3",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        }
      ]
    },
    {
      name: "third",
      body:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis.",
      post: [
        {
          name: "post1",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post2",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post3",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        }
      ]
    },
    {
      name: "fourth",
      body:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis.",
      post: [
        {
          name: "post1",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post2",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        },
        {
          name: "post3",
          body:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac lacus convallis, efficitur dui id, dapibus arcu. Praesent id libero lobortis, mattis nulla eget, sagittis."
        }
      ]
    }
  ];
}
