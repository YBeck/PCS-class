import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Observable } from "rxjs/Observable";
import { Contact } from "./contact";

const httpOptions = {
  headers: new HttpHeaders({
    "Content-Type": "application/json",
    Authorization: "my-auth-token",
    responseType: "text"
  })
};

@Injectable()
export class ContactService {
  constructor(private http: HttpClient) {}

  getContacts(): Observable<Contact[]> {
    return this.http.get<Contact[]>(
      "http://localhost/homework/javascript/HW103/src/app/shared/getContacts.php"
    );
  }

  addContact(contact: Contact): Observable<Contact> {
    console.log("made it to service", contact);
    return this.http.post<Contact>(
      "http://localhost/homework/javascript/HW103/src/app/shared/addContacts.php",
      contact,
      httpOptions
    );
  }
}
