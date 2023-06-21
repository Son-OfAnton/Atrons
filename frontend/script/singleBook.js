const bookWrapper = document.querySelector(".book-wrapper");
const bookCoverContainer = document.querySelector(".book-cover-container");

function searchByTitle(title) {
  return fetch(
    `http://localhost/Atrons/backend/api/book/read_single.php?title=${title}`
  )
    .then((response) => response.json())
    .then((data) => data);
}

function renderBook(book) {
  const bookCover = document.querySelector(".book-cover");
  const bookTitle = document.querySelector(".book-title");
  const bookAuthor = document.querySelector(".book-author");
  const bookPrice = document.querySelector(".book-price");
  const bookDescription = document.querySelector(".book-description");

  bookCover.src = book.cover_photo;
  bookTitle.textContent = book.title;
  bookAuthor.textContent = book.author;
  bookPrice.textContent = book.price + " birr";
  bookDescription.textContent = book.description;
}

// Get the title from the query string
const urlParams = new URLSearchParams(window.location.search);
const title = urlParams.get("title");
// console.log("///", title);

// Fetch the book data and render it
searchByTitle(title)
  .then((book) => {
    console.log(book)
    renderBook(book.data);
    const cartBtn = document.getElementsByClassName("cart-btn")[0];
    cartBtn.setAttribute("id", `${book.data.isbn}`)
    cartBtn.addEventListener("click", addToCart)
  })
  .catch((error) => {
    console.error("Error:", error);
  });

//Listner to the add cart button
function addToCart(event) {
  var apiUrl = "http://localhost/Atrons/backend/api/cart/add_to_cart.php";
  var ISBN = event.target.id;
  console.log("ISBN === ", ISBN);
  var requestData = {
    ISBN: `${ISBN}`,
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
