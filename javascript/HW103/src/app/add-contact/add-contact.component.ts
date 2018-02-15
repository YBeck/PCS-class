import { Component, OnInit, OnDestroy } from "@angular/core";
import { NgForm } from "@angular/forms";
import { ContactService } from "../shared/contact.service";
import { Contact } from "../shared/contact";
import { Observable } from "rxjs/Observable";
import { Subscription } from "rxjs/Subscription";

@Component({
  selector: "app-add-contact",
  templateUrl: "./add-contact.component.html",
  styleUrls: ["./add-contact.component.css"]
})
export class AddContactComponent implements OnInit {
  constructor(private contactService: ContactService) {}

  contact: Contact;
  obs: Subscription;
  addContact(form: NgForm) {
    this.contact = {
      first_name: form.value.first_name,
      last_name: form.value.last_name,
      email: form.value.email,
      phone: form.value.phone
    };
    this.obs = this.contactService
      .addContact(this.contact)
      .subscribe(
        () => console.log("Successfully added contact"),
        err =>
          console.error("Something went wrong with adding the contact ", err),
        () => console.log("Completed adding the contact")
      );
    console.log("submited");
    console.log(this.contact);
  }
  ngOnInit() {}

  ngOnDestroy() {
    if (this.obs) {
      this.obs.unsubscribe();
    }
  }
}
