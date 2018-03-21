(function() {
  "use strict";
  const commentForm = document.getElementById("commentForm");
  const addCommentBtn = document.getElementById("addCommentBtn");

  addCommentBtn.addEventListener("click", () => {
    commentForm.style.display = "inline-block";
    addCommentBtn.style.display = "none";
  });

  commentForm.addEventListener("submit", () => {
    commentForm.style.display = "none";
    addCommentBtn.style.display = "inline-block";
  });
})();
