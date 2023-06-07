const categories = document.getElementById("categories");
const menu = document.getElementsByClassName("mega-menu")[0];

categories.addEventListener("mouseenter", function () {
  menu.style.display = "flex";
});

menu.addEventListener("mouseleave", function () {
  menu.style.display = "none";
});
