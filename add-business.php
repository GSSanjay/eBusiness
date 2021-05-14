<?php
    session_start();

    if(!isset($_SESSION['username'])){
        echo "You are logged out";
        header("location:user-login.php");
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
    <link rel="stylesheet" href="css/add-business.css"/>
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>


    <?php
        error_reporting(E_ERROR | E_PARSE);

        // DB Connection
        include("config/db-connect.php");
        $form_error = "";
        $success_message = "";

        if(isset($_POST["submit"])){
            $business_name = mysqli_real_escape_string($conn, $_POST["business_name"]);
            // $item_image = mysqli_real_escape_string($conn, $_POST["item_image"]);
            $business_email = mysqli_real_escape_string($conn, $_POST["business_email"]);
            // $business_addedon = mysqli_real_escape_string($conn, $_POST["business_addedon"]);
                     

            date_default_timezone_set("Asia/Kolkata");
            $business_addedon = date("Y-m-d H:i:s");

            $query_insert = "INSERT INTO business(business_name, business_email, business_addedon) VALUES('$business_name', '$business_email', '$business_addedon')";
            $query_insert_db = mysqli_query($conn, $query_insert);

            if($query_insert_db){
                $success_message = "New business added";
                echo "Business added";
                header("location:add-business.php?success_message=".$success_message);

            }
            else{
                $form_error = "Business couldn't be added";
            }
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php include("logo.html") ?>
        <div class="container">
            <div class="box1">
                <h2><a href="user.php" class="user_name">User Home - <?php echo $_SESSION['username']; ?></a></h2>
          
            </div>

            <h2>Add business</h2>
            <div class="box2">
                <?php $success_message = $_GET["success_message"]; ?>
                <span class="success"><?php echo $success_message; ?></span>
                <span class="error"><?php echo $form_error; ?></span>
                <span><label for="business_name">Business Name</label><span class="error"></span></span>
                <input type="text" name="business_name" id="business_name" required/>

                <span><label for="business_email">Business Email</label><span class="error"></span></span>
                <input type="email" name="business_email" id="business_email" required/>

       <!--           <span><label for="business_addedon">Business Addedon</label><span class="error"></span></span>
                <input type="text" name="business_addedon" id="business_addedon" required/> -->
     

                <div>
                    <button type="submit" name="submit">Add Business</button>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.html") ?>
</body>
</html>