<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/32705a7e45.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    <header>
        <h1>LOGO</h1>
        <nav>
            <ul><a id="book" href="#"><i class="fa-solid fa-book-open fa-2xs"></i>Books</a></ul>
            <ul><a id="user" href="#"><i class="fa-solid fa-users fa-2xs"></i>Users</a></ul>
            <ul><a id="log" href="#"><i class="fa-solid fa-xs fa-plus"></i>New Book</a></ul>
        </nav>
    </header>
    <main>
        <div class="header">
            <h3>Books List</h3>
            <form action="" class="search">
                <label for="search"><i class="fa-solid fa-xs fa-magnifying-glass" style="color: #a3a3a3"></i></label> 
                <input type="text" placeholder="Search book" id="search">
            </form>
        </div>
        <table border="0">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
        <button><i class="fa-solid fa-2xl fa-plus"></i></button>
    </main>
</body>
<script src="books.js"></script>

</html>