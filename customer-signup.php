<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodshala - Customer Signup</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/customer-signup.css"/>
    <link rel="stylesheet" href="css/utils.css"/>
</head>
<body>
    <?php
        // DB Connection
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST["submit"])){
            $customer_name = mysqli_real_escape_string($conn, $_POST["customer_name"]);
            $customer_email = mysqli_real_escape_string($conn, $_POST["customer_email"]);
            $customer_password = mysqli_real_escape_string($conn, $_POST["customer_password"]);
            $customer_cpassword = mysqli_real_escape_string($conn, $_POST["customer_cpassword"]);
            $customer_phone = mysqli_real_escape_string($conn, $_POST["customer_phone"]);
            $customer_address = mysqli_real_escape_string($conn, $_POST["customer_address"]);
            $customer_preference = mysqli_real_escape_string($conn, $_POST["customer_preference"]);

            $customer_password_hashed = password_hash($customer_password, PASSWORD_BCRYPT);
            $customer_cpassword_hashed = password_hash($customer_cpassword, PASSWORD_BCRYPT);

            $query_email = "SELECT * from customer WHERE customer_email = '$customer_email'";
            $result_email = mysqli_query($conn, $query_email);
            $result_email_count = mysqli_num_rows($result_email);

            if($result_email_count > 0){
                $form_error = "The email already registered";
            }
            else{
                if($customer_password == $customer_cpassword){
                    $query_insert = "INSERT INTO customer(customer_email, customer_password, customer_cpassword, customer_name, customer_address, customer_phone, preference) VALUES('$customer_email', '$customer_password_hashed', '$customer_cpassword_hashed', '$customer_name', '$customer_address', '$customer_phone', '$customer_preference')";
                    $query_insert_db = mysqli_query($conn, $query_insert);

                    if($query_insert_db){
                        // echo "Inserted";
                        echo "<script>window.location.href='customer-login.php'</script>";
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
            <h1>Ready to taste your favorite food? </br>Sign up below</h1>
            <div class="box">
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="customer_name">Name</label><span class="error"></span></span>
                <input type="text" name="customer_name" id="customer_name" required/>
                <span><label for="customer_email">Email</label><span class="error"></span></span>
                <input type="email" name="customer_email" id="customer_email" required/>
                <span><label for="customer_password">Password</label><span class="error"></span></span>
                <input type="password" name="customer_password" id="customer_password" minlength="8" required/>
                <span><label for="customer_cpassword">Confirm Password</label><span class="error"></span></span>
                <input type="password" name="customer_cpassword" id="customer_cpassword" minlength="8" required/>
                <span><label for="customer_phone">Phone</label><span class="error"></span></span>
                <input type="tel" name="customer_phone" id="customer_phone" pattern="[0-9]{10}" required/>
                <span><label for="customer_preference">Preference</label><span class="error"></span></span>
                <div class="preference">
                    <input type="radio" value="Veg" name="customer_preference" id="customer_preference" required>Veg</input>
                    <input type="radio" value="Non Veg" name="customer_preference" id="customer_preference" required>Non Veg</input>
                </div> 
                <span><label for="customer_address">Address</label><span class="error"></span></span>
                <textarea name="customer_address" rows="4" cols="50" id="customer_address" required></textarea>
                <div>
                    <button type="submit" name="submit"> Create an account</button>
                    <h4>Already have an account? </br><a href="customer-login.php">Login</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>