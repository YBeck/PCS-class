/*jshint  -W104, -W119 */
import $ from "jquery";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "./style.css";
// (function() {
//   "use strict";
const list = $("#li"); //<li> all users
const postsList = $("#postsList"); //<li> all posts
const indexButtons = $("#index"); // next and previous button div
const commentForm = $("#addForm"); //<form> to add a comment
const addComment = $("#textarea"); //<textarea> to add the comment
let id; //variable to save the user id from local storage
let startIndex = 0; // start and end index to display 3 posts
let endIndex = 3;
let allPosts; // variable to save all the posts globally
let currentPost; // variable to save current post id to add a comment

// get users and append them to list
$.getJSON("https://jsonplaceholder.typicode.com/users?callback=?", data => {
  //console.log(data);
  $.each(data, (index, element) => {
    list.append(`<ul class="list-group inner-list" id="${
      element.id
    }"><li class="list-group-item">
      Name: \u00A0${element.name}</li>
        <li class="list-group-item">Website:\u00A0${element.website} </li>
        <li class="list-group-item">company name:\u00A0 ${
          element.company.name
        }\u00A0
        Catch Prase:\u00A0${element.company.catchPhrase} \u00A0About: \u00A0
        ${element.company.bs}</li>
</ul>`);
  });
  click();
});

// add the id to localStorage
function click() {
  list.click(event => {
    //console.log(event.target.parentNode.id);
    localStorage.setItem("id", event.target.parentNode.id);
    $(location).attr("href", "posts.html"); //redirect to posts page
  });
}

// get all posts for current user
function getPosts(callback) {
  if (localStorage.getItem("id")) {
    id = localStorage.getItem("id");
    $.getJSON(
      "https://jsonplaceholder.typicode.com/posts?callback=?",
      {
        userId: id
      },
      data => {
        //console.log(data);
        callback(data);
        displayPosts();
        showNextPosts();
      }
    );
  }
}

// set allPosts variable to users posts
getPosts(items => (allPosts = items));

// displays the posts in the list
function displayPosts() {
  postsList.empty();
  for (let i = startIndex; i < endIndex; i++) {
    $(`<ul class="list-group inner-list" id="${allPosts[i].id}">
            <li class="list-group-item">
            Title: \u00A0 ${allPosts[i].title} </li>
            <li class="list-group-item">${allPosts[i].body} </li>
            <li class="list-group-item"><span id="comment${
              allPosts[i].id
            }"></span></li>
            <li class="list-group-item"><div><button class="btn btn-link"id="addCommentButton${
              allPosts[i].id
            }">Add comment</button>
            <button class="btn btn-primary" id="commentButton${
              allPosts[i].id
            }">Show comments</button></div></li></ul>`)
      .appendTo(postsList)
      .find(`#commentButton${allPosts[i].id}`)
      .click(() => toggleComments(allPosts[i].id))
      .end()
      .find(`#addCommentButton${allPosts[i].id}`)
      .click(() => {
        currentPost = allPosts[i].id; //set global variable with current id
        commentForm.show(); //show the texarea
      });
  }
}

// gets comments on current post
function toggleComments(id) {
  const commentButton = $(`#commentButton${id}`);
  const commentSpan = $(`#comment${id}`);
  let counter = 1;

  if (commentButton.text() === "Show comments") {
    //only if it's first time requesting comment
    if (commentSpan.is(":empty")) {
      $.getJSON(
        "https://jsonplaceholder.typicode.com/comments?callback=?",
        { postId: id },
        comment => {
          $.each(comment, (index, element) => {
            commentSpan.append(`<ul class="list-group inner-list">
            <li class="list-group-item">Comment number${counter++}: 
            ${element.body}</li></ul>`);
          });
        }
      );
    }
    commentSpan.show();
    commentButton.text("Hide");
  } else {
    //if text is 'hide'
    commentSpan.hide();
    commentButton.text("Show comments");
  }
}

function showNextPosts() {
  indexButtons.click(e => {
    if (e.target.innerHTML === "Next") {
      startIndex += 3;
      if (startIndex >= allPosts.length) {
        startIndex = 0;
      }
    } else if (e.target.innerHTML === "Previous") {
      startIndex -= 3;
      if (startIndex < 0) {
        startIndex = 0;
      }
    }
    endIndex =
      startIndex <= allPosts.length - 3 ? startIndex + 3 : allPosts.length;
    // console.log("index ", startIndex);
    displayPosts();
  });
}

//event handler to add a comment
commentForm.on("submit", event => {
  event.preventDefault();
  const comment = addComment.val();
  $.post(
    "https://jsonplaceholder.typicode.com/comments?callback=?",
    {
      postId: currentPost,
      body: comment
    },
    result => {
      console.log("comment was successfully added ", result);
    }
  );
  addComment.empty();
  commentForm.hide();
});
//})();
