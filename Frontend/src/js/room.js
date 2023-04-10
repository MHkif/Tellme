
function expandVideoFrame(e) {
  let displayFrame = document.getElementById("stream_box");

  alert("From Expand");
  let child = displayFrame.children[0];
  if (child) {
    document.getElementById("users_snap").appendChild(child);
  }
  displayFrame.style.display = "block";
  displayFrame.appendChild(e.currentTarget);
  // this.userIdInDisplayFrame = e.currentTarget.id;
}
