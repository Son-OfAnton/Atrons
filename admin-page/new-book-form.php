<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Karla:ital,wght@0,200;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/form-style.css">
    <title>New book form</title>
</head>
<body>
    <h4>New book form</h4>
    <form action="../backend/api/book/add.php" class="new" method="post" enctype="multipart/form-data">
        <label for="isbn">ISBN: </label>
        <input type="text" name="isbn" id="isbn">
        <label for="title">TITLE: </label>
        <input type="text" name="title" id="title">
        <label for="author">AUTHOR: </label>
        <input type="text" name="author" id="author">
        <label for="num_copies">AMOUNT: </label>
        <input type="text" name="num_copies" id="num_copies">
        <label for="price">PRICE: </label>
        <input type="text" name="price" id="price">
        <label for="cover_photo" id="file">UPLOAD COVER PAGE HERE</label>
        <input type="file" name="cover_photo" id="cover_photo">
        <label for="category">CATEGORY: </label>
        <div class="boxes">
            <input type="radio" id="fiction" value="Fiction" name="category"> <label for="ficiton">Fiction</label>
            <input type="radio" name="category" id="biography" value="Biography"><label for="ficiton">Fiction</label>
    
            <input type="radio" name="category" id="scientfic" value="Science fiction"><label for="ficiton">Fiction</label>
            <input type="radio" name="category" id="history" value="History"><label for="ficiton">Fiction</label>
        </div>
        <label for="discription">DISCRIPTION: </label>
        <textarea name="description" id="discription" cols="15" rows="7" placeholder="Write the discription here..."></textarea>
        <div class="buttons">
            <input type="submit" name="add" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
<script src="script/form.js"></script>
</html>