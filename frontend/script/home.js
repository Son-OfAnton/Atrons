const categories = document.getElementById("categories");
const menu = document.getElementsByClassName("mega-menu")[0];
let hideTimeout;

categories.addEventListener("mouseenter", function () {
  clearTimeout(hideTimeout);
  menu.style.display = "flex";
});

categories.addEventListener("mouseleave", function () {
  hideTimeout = setTimeout(function () {
    menu.style.display = "none";
  }, 200);
});

menu.addEventListener("mouseenter", function () {
  clearTimeout(hideTimeout);
});

menu.addEventListener("mouseleave", function () {
  hideTimeout = setTimeout(function () {
    menu.style.display = "none";
  }, 200);
});
