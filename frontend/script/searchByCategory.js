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

async function searchByCategory(categoryName) {
  try {
    const response = await fetch(
      `http://localhost/atrons/backend/api/book/read_single_category.php?category=${categoryName}`
    );
    const data = await response.json();
    renderCategoryCards(data.data);
  } catch (error) {
    console.error("Error:", error);
  }
}

function renderCategoryCards(categoryData) {
  searchResultSize.textContent = `${categoryData.length}`;

  categoryData.forEach((book) => {
    const card = document.createElement("div");
    card.setAttribute("id", `${book.ISBN}`);
    card.style.cursor = "pointer";
    card.classList.add("card");

    const imgWrapper = document.createElement("div");
    imgWrapper.classList.add("img-wrapper");

    const image = document.createElement("img");
    image.src = book.cover_photo;
    image.alt = "Book";
    image.classList.add("card-image");
    // card.appendChild(image);
    imgWrapper.appendChild(image);
    card.appendChild(imgWrapper);

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
    card.appendChild(buttons);

    const cartButton = document.createElement("button");
    cartButton.classList.add("cart-btn");
    cartButton.textContent = "Add to cart";
    cartButton.setAttribute("onclick", "addToCart(this);");
    buttons.appendChild(cartButton);

    cardContainer.appendChild(card);

    content.addEventListener("click", function () {
      const encodedTitle = book.title.replace(/\s+/g, "%20");
      console.log(encodedTitle);
      // console.log(`single-book.php?title=${encodedTitle}`);
      window.location.href = `single-book.php?title=${encodedTitle}`;
    });
    image.addEventListener("click", function () {
      const encodedTitle = book.title.replace(/\s+/g, "%20");
      console.log(encodedTitle);
      // console.log(`single-book.php?title=${encodedTitle}`);

      window.location.href = `single-book.php?title=${encodedTitle}`;
    });
  });
}

function findAncestorWithId(element) {
  var currentElement = element.parentNode;

  while (currentElement !== null) {
    if (currentElement.hasAttribute("id")) {
      return currentElement;
    }
    currentElement = currentElement.parentNode;
  }

  return null;
}

function addToCart(addButton) {
  console.log("I am clicked");
  var apiUrl = "http://localhost/atrons/backend/api/cart/add_to_cart.php";
  var ISBN = findAncestorWithId(addButton).getAttribute("id");
  console.log("ISBN === ", ISBN);

  var sessionUrl = "http://localhost/atrons/backend/api/cart/add_to_cart.php";
  var sessionXhr = new XMLHttpRequest();
  sessionXhr.open("GET", sessionUrl, true);
  sessionXhr.onreadystatechange = function () {
    if (sessionXhr.readyState === 4 && sessionXhr.status === 200) {
      var sessionResponse = JSON.parse(sessionXhr.responseText);
      var userEmail = sessionResponse.email;

      var requestData = {
        email: userEmail,
        ISBN: ISBN,
      };

      var xhr = new XMLHttpRequest();
      xhr.open("POST", apiUrl, true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response.message); // Output the response message
          } else {
            console.error("Error:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(requestData));
    }
  };

  sessionXhr.send();
}
