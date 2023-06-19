<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registration </title>
    <link rel="stylesheet" href="./style/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form id="registration-form" action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input id="first-name" type="text" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input id="last-name" type="text" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input id="email" type="text" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input id="phone" type="text" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input id="password" type="password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input id="confirm-password" type="password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <script src="./script/registration.js"></script>
</body>

</html>