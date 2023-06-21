const categories = document.getElementById("categories");
const menu = document.getElementsByClassName("mega-menu")[0];
const silder = document.getElementsByTagName('figure');
fetch('localhost/Atrons/backend/api/book/read.php?arrival=yes')

categories.addEventListener("mouseenter", function () {
  menu.style.display = "flex";
});

menu.addEventListener("mouseleave", function () {
  menu.style.display = "none";
});
0