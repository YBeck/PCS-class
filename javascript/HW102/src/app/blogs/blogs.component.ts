import { Component, OnInit, Input } from "@angular/core";
import { Blog } from "../shared/blogs";

@Component({
  selector: "app-blogs",
  templateUrl: "./blogs.component.html",
  styleUrls: ["./blogs.component.css"]
})
export class BlogsComponent implements OnInit {
  @Input() blog: Blog[];
  constructor() {}

  ngOnInit() {}
}
