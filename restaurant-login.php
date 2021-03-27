<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/restaurant-signup.css"/>
    <link rel="stylesheet" href="css/utils.css" />
    <title>Restaurant Login</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST["submit"])){
            $restaurant_email = $_POST["restaurant_email"];
            $restaurant_password = $_POST["restaurant_password"];

            $query = "SELECT * FROM restaurant WHERE restaurant_email = '$restaurant_email'";
            $result = mysqli_query($conn, $query);
            $result_count = mysqli_num_rows($result);

            if($result_count){
                $restaurant = mysqli_fetch_assoc($result);
                $restaurant_password_db = $restaurant['restaurant_password'];
                $_SESSION['restaurant_name'] = $restaurant['restaurant_name'];
                $_SESSION['restaurant_email'] = $restaurant['restaurant_email'];

                $restaurant_password_decoded = password_verify($restaurant_password, $restaurant_password_db);

                // echo $restaurant_password_db; 
                // echo $restaurant_password_decoded;
                if($restaurant_password_decoded){
                    // echo "Login successful";
                    header("location:restaurant.php");
                }
                else{
                    // echo "Incorrect password";
                    $form_error = "Incorrect password";
                }
            }
            else{
                // echo "Invalid email";
                $form_error = "Invalid email";
            }
        }
    ?>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <?php include("logo.html") ?>
        <div class="signup-container">
            <h1>Login as a restaurant</h1>
            <div class="signup">
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="restaurant_email">Email</label><span class="error"></span></span>
                <input type="email" name="restaurant_email" id="restaurant_email" required/>
                <span><label for="restaurant_password">Password</label><span class="error"></span></span>
                <input type="password" name="restaurant_password" id="restaurant_password" required/>
                <div>
                    <button type="submit" class="login-btn" name="submit">Login</button>
                    <h4>Don't have an account?</br> <a href="restaurant-signup.php">Sign up</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>