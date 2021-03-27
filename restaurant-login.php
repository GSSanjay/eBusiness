<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/restaurant-signup.css"/>
    <link rel="stylesheet" href="css/font.css" />
    <title>Restaurant Login</title>
</head>
<body>
    <form action="validate-restaurant-login.php" method="POST">
        <?php include("logo.html") ?>
        <div class="signup-container">
            <h1>Login as a restaurant</h1>
            <div class="signup">
                <span><label for="restaurant_email">Email</label><span class="error"></span></span>
                <input type="email" name="restaurant_email" id="restaurant_email" required/>
                <span><label for="restaurant_password">Password</label><span class="error"></span></span>
                <input type="password" name="restaurant_password" id="restaurant_password" required/>
                <div>
                    <button type="submit" name="submit">Login</button>
                    <h4>Don't have an account?</br> <a href="restaurant-signup.php">Sign up</a> </h4>
                </div>
            </div>
        </div>

    </form>
    <?php include("footer.html") ?>
</body>
</html>