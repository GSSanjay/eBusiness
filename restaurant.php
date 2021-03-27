<?php
    session_start();

    if(!isset($_SESSION['restaurant_name'])){
        echo "You are logged out";
        header("location:restaurant-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/restaurant.css" />
    <title>Restaurant Home</title>
</head>
<body>
    <?php include("logo.html") ?>
    <section class="container">
        <div class="box1">
            <ul>
                <li><a href="">Add Items</a></li>
                <li><a href="">View Items</a></li>
                <li><a href="">View Orders</a></li>
            </ul>
        </div>

        <div class="box2">
        <h2>Hey <?php echo $_SESSION['restaurant_name']; ?></h2>
        <div class="logout"><a href="restaurant-logout.php">Logout</a></div>
        </div>
    </section>
</body>
</html>