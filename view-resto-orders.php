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
    <title>Foodshala - Restaurant Orders</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/view-orders.css" />
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php include("logo.html") ?>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>


    <section class="container">
        
        <div class="box2">
            <h2><a href = "restaurant.php" class="user-name"><?php echo $_SESSION['restaurant_name']; ?></a></h2>
            <h2>Restaurant Orders</h2>
            <div class="logout"><a href="restaurant-logout.php">Logout</a></div>
        </div>
             <!-- Query data from database  -->
        <?php
            $restaurant_name = $_SESSION['restaurant_name'];
            $query_food = "SELECT o.order_id, c.customer_id, c.customer_name, c.customer_address, o.item_name, o.quantity, o.total_price, o.restaurant_name, o.order_date_time FROM order_details o, customer c WHERE  o.restaurant_name = '$restaurant_name' AND c.customer_id = o.customer_id";
            $result_food = mysqli_query($conn, $query_food);
            $result_food_count = mysqli_num_rows($result_food);

            echo '
            <table class="table">
                <tr class="table-h">
                <td>Customer Name</td>
                <td>Customer Address</td>
                <td>Item</td>
                <td>Quantity</td>
                <td>Total Amount</td>
                <td>Ordered On</td>
                </tr>
            </table>';
            
            if($result_food_count > 0){
                while($row = mysqli_fetch_assoc($result_food)){

                    echo '
                    <div class="table">

                        <table>
                            <tr>
                                <td>'.$row["customer_name"].'</td>
                                <td>'.$row["customer_address"].'</td>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["quantity"].'</td>
                                <td>&#x20B9;'.$row["total_price"].'</td>
                                <td>&#x20B9;'.$row["order_date_time"].'</td>
                            </tr>
                        </table>
                    </div>';
                    // echo $row["restaurant_name"]; 
                }
            }
            else{
                echo "<h2>No orders found</h2>";
            }
        ?>
           
    </section>
    <?php include("footer.html") ?>
</body>
</html>