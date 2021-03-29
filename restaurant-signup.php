<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodshala - Restaurant Signup</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/restaurant-signup.css"/>
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php
        // DB Connection
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST["submit"])){
            $restaurant_name = mysqli_real_escape_string($conn, $_POST["restaurant_name"]);
            $restaurant_email = mysqli_real_escape_string($conn, $_POST["restaurant_email"]);
            $restaurant_password = mysqli_real_escape_string($conn, $_POST["restaurant_password"]);
            $restaurant_cpassword = mysqli_real_escape_string($conn, $_POST["restaurant_cpassword"]);
            $restaurant_phone = mysqli_real_escape_string($conn, $_POST["restaurant_phone"]);
            $restaurant_details = mysqli_real_escape_string($conn, $_POST["restaurant_details"]);

            $restaurant_password_hashed = password_hash($restaurant_password, PASSWORD_BCRYPT);
            $restaurant_cpassword_hashed = password_hash($restaurant_cpassword, PASSWORD_BCRYPT);

            $query_email = "SELECT * from restaurant WHERE restaurant_email = '$restaurant_email'";
            $result_email = mysqli_query($conn, $query_email);
            $result_email_count = mysqli_num_rows($result_email);

            if($result_email_count > 0){
                $form_error = "The email already registered";
            }
            else{
                if($restaurant_password == $restaurant_cpassword){
                    $query_insert = "INSERT INTO restaurant(restaurant_email, restaurant_password, restaurant_cpassword, restaurant_name, restaurant_details, restaurant_phone) VALUES('$restaurant_email', '$restaurant_password_hashed', '$restaurant_cpassword_hashed', '$restaurant_name', '$restaurant_details', '$restaurant_phone')";
                    $query_insert_db = mysqli_query($conn, $query_insert);

                    if($query_insert_db){
                        // echo "Inserted";
                        echo "<script>window.location.href='restaurant-login.php'</script>";
                    }
                    else{
                        // echo "Not inserted";
                    }
                }
                else{
                    $form_error = "Passwords are not matching";
                }
            }
        }
    ?>

    <form action="" method="POST">
        <?php include("logo.html") ?>
        <div class="container">
            <h1>Sign up to register your restaurant</h1>
            <div class="box">
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="restaurant_name">Restaurant Name</label><span class="error"></span></span>
                <input type="text" name="restaurant_name" id="restaurant_name" required/>
                <span><label for="restaurant_email">Email</label><span class="error"></span></span>
                <input type="email" name="restaurant_email" id="restaurant_email" required/>
                <span><label for="restaurant_password">Password</label><span class="error"></span></span>
                <input type="password" name="restaurant_password" id="restaurant_password" minlength="8" required/>
                <span><label for="restaurant_cpassword">Confirm Password</label><span class="error"></span></span>
                <input type="password" name="restaurant_cpassword" id="restaurant_cpassword" minlength="8" required/>
                <span><label for="restaurant_phone">Phone</label><span class="error"></span></span>
                <input type="tel" name="restaurant_phone" id="restaurant_phone" pattern="[0-9]{10}" required/>
                <span><label for="restaurant_details">Restaurant Details</label><span class="error"></span></span>
                <textarea name="restaurant_details" rows="4" cols="50" id="restaurant_details"></textarea>
                <div>
                    <button type="submit" name="submit"> Create an account</button>
                    <h4>Already have an account?</br> <a href="restaurant-login.php">Login</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>