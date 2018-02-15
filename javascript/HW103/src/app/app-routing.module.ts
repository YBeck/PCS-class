import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { ContactComponent } from "./contact/contact.component";
import { AddContactComponent } from "./add-contact/add-contact.component";

const routes: Routes = [
  {
    path: "contacts",
    component: ContactComponent
  },
  {
    path: "add",
    component: AddContactComponent
  },
  {
    path: "",
    redirectTo: "contacts",
    pathMatch: "full"
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
