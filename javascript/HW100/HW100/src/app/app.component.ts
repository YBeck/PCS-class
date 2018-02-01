import { Component } from "@angular/core";
import { Person } from "./shared/person";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  title = "Home work 100";

  person: Person = {
    firstName: "Donald",
    lastName: "Trump",
    address: {
      city: "Washington DC",
      address: "1600 Pensylvania Ave",
      zip: "111111"
    }
  };
}
