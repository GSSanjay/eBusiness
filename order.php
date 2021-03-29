<?php
    session_start();
    if(!isset($_SESSION['customer_name'])){
        echo "You need to login to place your order. Redirecting to login page...";
        // header("location:customer-login.php");
        // header("Refresh: 5; url=customer-login.php");
        header("Refresh: 0; url=customer-login.php");
    }
    else{
        include("config/db-connect.php");
        $success_msg = "";
        if(isset($_GET)){
            $item_name = $_GET["item_name"];
            $restaurant_name = $_GET["restaurant_name"];
            $qty = (int)$_GET["qty"];
            $item_price = (int)$_GET["item_price"];

            $total_price = $item_price * $qty;
            $customer_id = $_SESSION['customer_id'];
            // echo $customer_id;

            // $query_order_id = "SELECT * from order_details WHERE order_details";
            // $date_time = date('Y-m-d H:i:s');

            $query_insert = "INSERT INTO order_details( customer_id, item_name, quantity, total_price, restaurant_name, order_date_time) VALUES('$customer_id', '$item_name', '$qty', '$total_price', '$restaurant_name', CURRENT_TIMESTAMP)";

            $query_insert_db = mysqli_query($conn, $query_insert);

            if($query_insert_db){
                $success_msg = "Hurray.. Your order has been placed";
                // header("location:customer.php?success_msg=Hurray.. Your order has been placed");
                header("location:customer.php?success_msg=$success_msg");
            }
            else{
                echo "Order not placed";
            }
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
    <title>Foodshala - Customer Home</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/user-home.css" />
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php include("logo.html") ?>


    <section class="container">
        <div class="header-menu">
            <h2>Hey, <?php echo $_SESSION['customer_name']; ?></h2>
            <div class="logout"><a href="customer-logout.php">Logout</a></div>
        </div>
        <div class="box">

             <div class="box2">
                <ul>
                    <h1><?php echo $success_msg; ?></h1>
                    <li><?php echo $restaurant_name; ?></li>
                     <li><?php echo $qty ." ".$item_name. "(s)"; ?></li>

                    <li><?php echo "Total amount to be paid: &#x20B9;".$total_price; ?></li>
                    <!-- <li><a href="customer-logout.php">Logout</a></li> -->
                </ul>
            </div>
            <div class="box1">
                <ul>
                    <li><a href="food.php">Food Menu</a></li>
                    <li><a href="">View Orders</a></li>
                    <!-- <li><a href="customer-logout.php">Logout</a></li> -->
                </ul>
            </div>
        </div>
        <!-- <div class="logout"><a href="customer-logout.php">Logout</a></div> -->
    </section>
    <?php include("footer.html") ?>
    
</body>
</html>