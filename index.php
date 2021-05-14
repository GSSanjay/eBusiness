<?php
    session_start();
    if(!isset($_SESSION['customer_name'])){
        // echo "You need to login to place your order. Redirecting to login page...";
     
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
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/food.css"/>
    <link rel="stylesheet" href="css/utils.css" />
    <!-- <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/> -->
    
</head>
<body>
    <!-- Main Section -->
    <main class="background">
        <!-- Header Section -->
        <?php include("header.php") ?>

        <section id="main-section">
            <div class="box">
                <h1 class="primary-heading">Manage your business online at your finger tips</h1>
                <p>Login or signup to get started..</p>
                
            </div>
        </section>
    </main>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>

    <?php
        if(isset($_POST["submit"])){
             if(!isset($_SESSION['customer_name'])){
                // echo "You need to login to place your order. Redirecting to login page...";
                
                header("Refresh: 0; url=user-login.php");
            }
            else{
                header("location:food.php");
            }
        }
    ?>

  
    <!-- Footer Section -->
    <?php include("footer.html")?>
    <script>
        const redirect_to_login = () => {
            window.location.href="user-login.php";
        }
        const redirect_to_food = () => {
            window.location.href="food.php";
        }
    </script>
</body>
</html>