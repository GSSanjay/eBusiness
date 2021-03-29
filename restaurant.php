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
    <title>Foodshala - Restaurant Home</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/user-home.css" />
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php include("logo.html") ?>
    <section class="container">
        
        <div class="box2">
            <h2>Restaurant Page</h2>
            <h2><?php echo $_SESSION['restaurant_name']; ?></h2>
            <div class="logout"><a href="restaurant-logout.php">Logout</a></div>
        </div>
        <div class="box1">
            <ul>
                <li><a href="add-item.php">Add Items</a></li>
                <li><a href="view-resto-items.php">View Items</a></li>
                <li><a href="view-resto-orders.php">View Orders</a></li>
            </ul>
        </div>

    </section>
    <?php include("footer.html") ?>
</body>
</html>