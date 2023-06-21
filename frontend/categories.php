<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/categories.css" />
  <title>Categories</title>
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


  <main class="main">

    <section class="sidebar">
      <ul>
        <h2>Categories</h2>
        <li><a href="#">Fiction</a></li>
        <li><a href="#">Romance</a></li>
        <li><a href="#">Sci-Fi</a></li>
        <li><a href="#">Adventure</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#">Biography</a></li>
        <li><a href="#">Psychology</a></li>
        <li><a href="#">Poetry</a></li>
        <li><a href="#">Children</a></li>
        <li><a href="#">Politics</a></li>
      </ul>
    </section>

    <section class="card-grid">
      <h3><span id="search-size"></span> search results</h3>
      <div class="searched-card-container">
      </div>
    </section>


  </main>

  <script src="./script/searchByCategory.js"></script>
  <script src="./script/searchByTitle.js"></script>

  <!-- <script src="./script/cart.js"></script> -->


  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get('category');

    searchByCategory(selectedCategory);
  </script>
</body>

</html>