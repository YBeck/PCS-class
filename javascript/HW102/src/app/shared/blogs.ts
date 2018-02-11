import { Post } from "./posts";

export interface Blog {
  name: string;
  body: string;
  post: Post[];
}
