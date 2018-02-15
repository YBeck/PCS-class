import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { NgbModule } from "@ng-bootstrap/ng-bootstrap";

import { AppComponent } from "./app.component";
import { ContactComponent } from "./contact/contact.component";
import { ContactService } from "./shared/contact.service";
import { HttpClientModule } from "@angular/common/http";
import { AddContactComponent } from "./add-contact/add-contact.component";
import { FormsModule } from "@angular/forms";

@NgModule({
  declarations: [AppComponent, ContactComponent, AddContactComponent],
  imports: [
    BrowserModule,
    AppRoutingModule,
    NgbModule.forRoot(),
    HttpClientModule,
    FormsModule
  ],
  providers: [ContactService, HttpClientModule],
  bootstrap: [AppComponent]
})
export class AppModule {}
