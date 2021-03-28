<?php
    session_start();
    if(!isset($_SESSION['customer_name'])){
        echo "You need to login to place your order. Redirecting to login page...";
        // header("location:customer-login.php");
        header("Refresh: 5; url=customer-login.php");
    }
    else{
        include("config/db-connect.php");

        if(isset($_GET)){
            $item_name = $_GET["item_name"];
            $restaurant_name = $_GET["restaurant_name"];
            $qty = (int)$_GET["qty"];
            $item_price = (int)$_GET["item_price"];

            $total_price = $item_price * $qty;

            $query = "INSERT INTO order( customer_id, item_name, quantity, total_price, restaurant_name) VALUES()";
        }
        
    }
?>

<?php
/*     session_start();

    if(!isset($_SESSION['customer_name'])){
        echo "You are logged out";
        header("location:customer-login.php");
    } */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/restaurant.css" />
    <link rel="stylesheet" href="css/utils.css" />
    <title>Customer Home</title>
</head>
<body>
    <?php include("logo.html") ?>


    <section class="container">
        <div class="header-menu">
            <h2>Hey, <?php echo $_SESSION['customer_name']; ?></h2>
            <div class="logout"><a href="customer-logout.php">Logout</a></div>
        </div>
        <div class="box">
            <div class="box1">
                <ul>
                    <li><a href="food.php">Food Menu</a></li>
                    <li><a href="">View Orders</a></li>
                    <!-- <li><a href="customer-logout.php">Logout</a></li> -->
                </ul>
            </div>
             <div class="box2">
                <ul>
                    <li><?php echo $restaurant_name; ?></li>
                    <li><?php echo $qty; ?></li>
                    <li><?php echo $total_price; ?></li>
                    <!-- <li><a href="customer-logout.php">Logout</a></li> -->
                </ul>
            </div>
        </div>
        <!-- <div class="logout"><a href="customer-logout.php">Logout</a></div> -->
    </section>
    <?php include("footer.html") ?>
</body>
</html>