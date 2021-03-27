<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer-signup.css"/>
    <link rel="stylesheet" href="css/utils.css"/>
    <title>Login</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST)){
            $customer_email = $_POST["customer_email"];
            $customer_password = $_POST["customer_password"];

            $query = "SELECT * FROM customer WHERE customer_email = '$customer_email'";
            $result = mysqli_query($conn, $query);
            $result_count = mysqli_num_rows($result);

            if($result_count){
                $restaurant = mysqli_fetch_assoc($result);
                $customer_password_db = $restaurant['customer_password'];
                $_SESSION['customer_name'] = $restaurant['customer_name'];
                $customer_password_decoded = password_verify($customer_password, $customer_password_db);

                // echo $customer_password_db; 
                // echo $customer_password_decoded;
                if($customer_password_decoded){
                    // echo "Login successful";
                    header("location:customer.php");
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
            <h1>Ready to taste your favorite food? </br>Login below</h1>
            <div class="signup">
                <span class="error"><?php echo $form_error; ?></span>
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