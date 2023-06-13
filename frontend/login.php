<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>

        <form class="login" action="http://localhost/Atrons/backend/api/user/read_single.php" method="get">
            <h3 class="title">User Login</h3>
            <p id="errormessage" style="display: none">Wrong Email or Password</p>
            <div class="text-input">
                <img class="icon" src="./assets/user.svg">
                <input name="email" id="email" type="email" placeholder="Username">
            </div>
            <div class="text-input">
                <img class="icon" src="./assets/lock.svg">
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <input type="submit" class="login-btn" value="LOGIN">
            <div class="create">
                <a href="#">Create new account</a>
            </div>
        </form>
    </div>
</body>
<script src="script\login.js"></script>

</html>