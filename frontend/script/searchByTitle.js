const searchBar = document.querySelector(".search-bar");
const searchBtn = document.querySelector(".search-btn");

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

function searchByTitle(title) {
  return fetch(
    `http://localhost/atrons/backend/api/book/read_single.php?title=${title}`
  )
    .then((response) => response.json())
    .then((data) => data);
}

searchBtn.addEventListener("click", function () {
  //   console.log("i am clicked");
  const title = searchBar.value;
  const encodedTitle = title.replace(/\s+/g, "%20");
  //   console.log(encodedTitle);
  searchByTitle(encodedTitle)
    .then((book) => {
      window.location.href = `single-book.php?title=${encodedTitle}`;
      renderBook(book.data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  const bookDetails = document.getElementsByClassName("book-details");
  bookDetails.setAttribute("id", `${book.ISBN}`);
});
