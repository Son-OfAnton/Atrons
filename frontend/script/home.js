const hamburger = document.getElementById("hamburger");
const sidebar = document.querySelector(".sidebar");

hamburger.addEventListener("click", function () {
  sidebar.style.left = sidebar.style.left === "-300px" ? "0" : "-300px";
});
