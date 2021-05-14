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
        //Image Upload
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
                
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/users/".$file_name);
                echo "<p style='color:white'>images/users/".$file_name."</p>";
                echo "<p style='color:white'>Success</p";
                $user_image = "images/users/".$file_name;
            }else{
                print_r($errors);
            }
        }
    ?>

    <?php
        // DB Connection
        include("config/db-connect.php");
        $form_error = "";

        if(isset($_POST["submit"])){
            $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
            $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);
            $user_cpassword = mysqli_real_escape_string($conn, $_POST["user_cpassword"]);
          
            $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);
            $user_cpassword_hashed = password_hash($user_cpassword, PASSWORD_BCRYPT);


            $query_email = "SELECT * from user WHERE user_email = '$user_email'";
            $result_email = mysqli_query($conn, $query_email);
            $result_email_count = mysqli_num_rows($result_email);

            if($result_email_count > 0){
                $form_error = "The email is already registered";
            }
            else{
                if($user_password == $user_cpassword){
                    $query_insert = "INSERT INTO user(user_email, user_password, user_cpassword, user_name, username, user_image) VALUES('$user_email', '$user_password_hashed', '$user_cpassword_hashed', '$user_name', '$username', '$user_image')";
                    $query_insert_db = mysqli_query($conn, $query_insert);

                    if($query_insert_db){
                        // echo "Inserted";
                        // echo "<script>window.location.href='user-login.php'</script>";
                        header("location:user-login.php");
                    }
                    else{
                        // echo "Not inserted";
                        echo "Registration could not be completed";
                    }
                }
                else{
                    $form_error = "Passwords are not matching";
                }
            }
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php include("logo.html") ?>
        <div class="container">
            <h1>Sign up </h1>
            <div class="box">
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="user_name">Name</label><span class="error"></span></span>
                <input type="text" name="user_name" id="user_name" required/>
                <span><label for="username">Username</label><span class="error"></span></span>
                <input type="text" name="username" id="username" required/>
                <span><label for="user_email">Email</label><span class="error"></span></span>
                <input type="email" name="user_email" id="user_email" required/>
                <span><label for="user_password">Password</label><span class="error"></span></span>
                <input type="password" name="user_password" id="user_password" minlength="8" required/>
                <span><label for="user_cpassword">Confirm Password</label><span class="error"></span></span>
                <input type="password" name="user_cpassword" id="user_cpassword" minlength="8" required/>

                <form action="" method="POST" enctype="multipart/form-data">
                    <span><label for="user_image">User Image</label><span class="error"></span></span>
                    <input class="file-type" type="file" name="image" />
                </form>
                <div>
                    <button type="submit" name="submit"> Create an account</button>
                    <h4>Already have an account?</br> <a href="user-login.php">Login</a> </h4>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>