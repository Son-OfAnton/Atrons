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
    renderBook(book.data);
    const bookDetails = document.getElementsByClassName("book-details")[0];
    bookDetails.setAttribute("id", `${book.data.isbn}`);
  })
  .catch((error) => {
    console.error("Error:", error);
  });
