import { Component, OnInit } from "@angular/core";
import { ContactService } from "../shared/contact.service";
import { Contact } from "../shared/contact";
import { Observable } from "rxjs/Observable";

@Component({
  selector: "app-contact",
  templateUrl: "./contact.component.html",
  styleUrls: ["./contact.component.css"]
})
export class ContactComponent implements OnInit {
  constructor(private contatsService: ContactService) {}
  contacts: Observable<Contact[]>;

  ngOnInit() {
    this.contacts = this.contatsService.getContacts();
  }
}
