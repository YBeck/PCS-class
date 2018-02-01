import { Component } from "@angular/core";
import { Input } from "@angular/core";
import { Person } from "../shared/person";
import { Address } from "../shared/address";

@Component({
  selector: "app-person",
  templateUrl: "./person.component.html",
  styleUrls: ["./person.component.css"]
})
export class PersonComponent {
  @Input() thePerson: Person;

  add: Address = {
    city: "Washington DC",
    address: "1600 Pensylvania Ave",
    zip: "111111"
  };

  //add: Address = this.thePerson.address;
}
