<?php
    session_start();

    if(!isset($_SESSION['customer_name'])){
        echo "You are logged out";
        header("location:customer-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/utils.css" />
    <title>Customer Home</title>
</head>
<body>
    <?php include("logo.html") ?>
    <section class="container-c">
        <!-- <div class="box"> -->
            <!-- <h2>Hey <?php echo $_SESSION['customer_name']; ?></h2> -->
            <div class="box2">
                <h2>Hey, <?php echo $_SESSION['customer_name']; ?></h2>
                <h4><?php //echo $_GET["success_msg"]; ?></h4>
                <div class="logout"><a href="customer-logout.php">Logout</a></div>
            </div>
            <div class="msg"><h4><?php if(isset($_GET["success_msg"])){ echo $_GET["success_msg"];} ?></h4></div>
            <div class="box1">
                <ul>
                    <li><a href="food.php">Food Menu</a></li>
                    <li><a href="view-cust-orders.php">View Orders</a></li>
                    <!-- <li><a href="customer-logout.php">Logout</a></li> -->
                </ul>
            </div>
        <!-- </div> -->
        <!-- <div class="logout"><a href="customer-logout.php">Logout</a></div> -->
    </section>
    <?php include("footer.html") ?>
</body>
</html>