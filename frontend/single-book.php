<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Single product</title>
  <link rel="stylesheet" href="style/single-book.css" />
</head>

<body>
  <div class="nav-icons">
    <a href="#">
      <img class="nav-svgs" src="assets/person.svg" />
    </a>
  </div>

  <nav>
    <div class="wrapper">
      <div class="top-nav">
        <div class="logo-title">
          <img class="logo" src="assets/book.svg" alt="" />
          <h1 class="title">atrons</h1>
        </div>
        <div class="search-wrapper">
          <input class="search-bar" type="text" placeholder="Search By Title" />
          <button class="search-btn" type="button">Search</button>
        </div>
      </div>
    </div>
  </nav>

  <section class="book-wrapper">
    <div class="book-cover-container">
      <img class="book-cover" src="" />
    </div>

    <div class="book-details">
      <h3 class="book-title"></h3>
      <p class="book-author"></p>
      <p class="book-price"></p>
      <p class="book-description">
      </p>
      <button class="cart-btn">Add to cart</button>
    </div>
  </section>

  <footer>
    <h1>About Us</h1>

    <div class="info">
      <div class="centered">
        <p>4 Kilo, Addis Ababa, Ethiopia</p>
        <p>info@atrons.com</p>
        <p>+251900026618</p>
      </div>

      <div class="links">
        <ul>
          <li>
            <a href="#">
              <img src="assets/instagram.svg" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/youtube.svg" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/telegram.svg" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/facebook.svg" alt="" />
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="./script/singleBook.js"></script>
  <script src="./script/searchByTitle.js"></script>
  <!-- <script src="./script/cart.js"></script> -->
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get('category');

    searchByTitle(selectedCategory);
  </script>
</body>

</html>