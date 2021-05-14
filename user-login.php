<?php
    session_start();
    if(!isset($_SESSION['username'])){
        // echo "You are logged out";
        // header("location:user-login.php");
    }
    else{
        header("location:user.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBusiness</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/user-signup.css"/>
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST["submit"])){
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];

            $query = "SELECT * FROM user WHERE user_email = '$user_email'";
            $result = mysqli_query($conn, $query);
            $result_count = mysqli_num_rows($result);

            if($result_count){
                $user = mysqli_fetch_assoc($result);
                $user_password_db = $user['user_password'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_id'] = $user['user_id'];

                $user_password_decoded = password_verify($user_password, $user_password_db);

                // echo $user_password_db; 
                // echo $user_password_decoded;
                if($user_password_decoded){
                    // echo "Login successful";
                    header("location:user.php");
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
        <div class="container">
            <h1>Login </h1>
            <div class="box">
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="user_email">Email</label><span class="error"></span></span>
                <input type="email" name="user_email" id="user_email" required/>
                <span><label for="user_password">Password</label><span class="error"></span></span>
                <input type="password" name="user_password" id="user_password" required/>
                <div>
                    <button type="submit" class="login-btn" name="submit">Login</button>
                    <h4>Don't have an account?</br> <a href="user-signup.php">Sign up</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>