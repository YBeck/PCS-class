import { Component, OnInit, Input } from "@angular/core";
import { Category } from "../shared/categories";

@Component({
  selector: "app-categories",
  templateUrl: "./categories.component.html",
  styleUrls: ["./categories.component.css"]
})
export class CategoriesComponent implements OnInit {
  constructor() {}

  ngOnInit() {}

  @Input() categories: Category[];
  sorry: "Sorry no items to display";
  delete(index) {
    this.categories.splice(index, 1);
  }
  add(index: string, name: string, price: number) {
    this.categories[index].items.push({ name: name, price: price });
  }
  selected: Category;
  showItems(index) {
    this.selected = this.categories[index];
  }
}
