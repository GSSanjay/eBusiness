<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer-signup.css"/>
    <link rel="stylesheet" href="css/font.css"/>
    <title>Login</title>
</head>
<body>
    <form action="validate-customer-login.php" method="POST">
        <?php include("logo.html") ?>
        <div class="signup-container">
            <h1>Ready to taste your favorite food? </br>Login below</h1>
            <div class="signup">
                <span><label for="customer_email">Email</label><span class="error"></span></span>
                <input type="email" name="customer_email" id="customer_email" required/>
                <span><label for="customer_password">Password</label><span class="error"></span></span>
                <input type="password" name="customer_password" id="customer_password" required/>
                <div>
                    <button type="submit" name="submit">Login</button>
                    <h4>Don't have an account?</br> <a href="customer-signup.php">Sign up</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>