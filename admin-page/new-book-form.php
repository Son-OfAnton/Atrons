<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Karla:ital,wght@0,200;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form-style.css">
    <title>New book form</title>
</head>
<body>
    <h4>New book form</h4>
    <form action="" class="new">
        <label for="isbn">ISBN: </label>
        <input type="text" name="isbn" id="isbn">
        <label for="title">TITLE: </label>
        <input type="text" name="title" id="title">
        <label for="author">AUTHOR: </label>
        <input type="text" name="author" id="author">
        <label for="publisher">PUBLISHER: </label>
        <input type="text" name="publisher" id="publisher">
        <label for="price">PRICE: </label>
        <input type="text" name="price" id="price">
        <label for="category">CATEGORY: </label>
        <div class="boxes">
            <input type="radio" name="fiction" id="fiction" value="Fiction"> <label for="ficiton">Fiction</label>
            <input type="radio" name="biography" id="biography"><label for="ficiton">Fiction</label>
    
            <input type="radio" name="scientfic" id="scientfic"><label for="ficiton">Fiction</label>
            <input type="radio" name="history" id="history"><label for="ficiton">Fiction</label>
        </div>
        <label for="discription">DISCRIPTION: </label>
        <textarea name="discription" id="discription" cols="15" rows="7" placeholder="Write the discription here..."></textarea>
        <div class="buttons">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
</html>