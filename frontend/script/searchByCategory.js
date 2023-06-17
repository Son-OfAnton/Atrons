const dropdownLinks = document.querySelectorAll(
  ".mega-menu .drop-menu .choice a"
);
const cardContainer = document.querySelector(".searched-card-container");
const searchResultSize = document.getElementById("search-size");
searchResultSize.textContent = 0;

dropdownLinks.forEach((link) => {
  link.addEventListener("click", function (event) {
    const categoryName = this.textContent.trim();
    searchByCategory(categoryName);
  });
});

const sidebarLinks = document.querySelectorAll(".sidebar ul li a");
sidebarLinks.forEach((link) => {
  link.addEventListener("click", function (event) {
    const categoryName = this.textContent.trim();
    while (cardContainer.firstChild) {
      cardContainer.removeChild(cardContainer.firstChild);
      searchResultSize.textContent = 0;
    }
    searchByCategory(categoryName);
  });
});

function searchByCategory(categoryName) {
  return fetch(
    `http://localhost/Atrons/backend/api/book/read_single_category.php?category=${categoryName}`
  )
    .then((response) => response.json())
    .then((data) => {
      renderCategoryCards(data.data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function renderCategoryCards(categoryData) {
  searchResultSize.textContent = `${categoryData.length}`;

  categoryData.forEach((book) => {
    const card = document.createElement("div");
    card.classList.add("card");

    const image = document.createElement("img");
    image.src = "/assets/newBook.jpg";
    image.alt = "Book";
    image.classList.add("card-image");
    card.appendChild(image);

    const content = document.createElement("div");
    content.classList.add("card-content");
    card.appendChild(content);

    const title = document.createElement("h3");
    title.classList.add("card-title");
    title.textContent = book.title;
    content.appendChild(title);

    const author = document.createElement("p");
    author.classList.add("card-author");
    author.textContent = book.author;
    content.appendChild(author);

    const price = document.createElement("p");
    price.classList.add("card-price");
    price.textContent = book.price + " birr";
    content.appendChild(price);

    const buttons = document.createElement("div");
    buttons.classList.add("card-buttons");
    content.appendChild(buttons);

    const cartButton = document.createElement("button");
    cartButton.classList.add("cart-btn");
    cartButton.textContent = "Add to cart";
    buttons.appendChild(cartButton);

    cardContainer.appendChild(card);
  });
}
