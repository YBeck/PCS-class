import { Component } from "@angular/core";
import { Category } from "./shared/categories";
import { Item } from "./shared/item";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  title = "Homework 101";

  categoryArray: Category[] = [
    {
      name: "Mp3_players",
      items: [
        {
          name: "Apple ipod",
          price: 99.0
        },
        {
          name: "Sansa clip",
          price: 75.0
        }
      ]
    },
    {
      name: "Laptops",
      items: [
        {
          name: "dell",
          price: 399.0
        },
        {
          name: "hp",
          price: 375.0
        }
      ]
    },
    {
      name: "printers",
      items: [
        {
          name: "Cannon",
          price: 199.0
        },
        {
          name: "brother",
          price: 75.0
        }
      ]
    },
    {
      name: "dishwasher"
    }
  ];
}
