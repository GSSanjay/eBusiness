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
    <link rel="stylesheet" href="css/view-resto-orders.css" />
    <link rel="stylesheet" href="css/utils.css" />
    <title>Restaurant Home</title>
</head>
<body>
    <?php include("logo.html") ?>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>


    <section class="container">
        
        <div class="box2">
            <h2>Restaurant Orders</h2>
            <h2><a href = "restaurant.php" class="user-name"><?php echo $_SESSION['restaurant_name']; ?></a></h2>
            <div class="logout"><a href="restaurant-logout.php">Logout</a></div>
        </div>
             <!-- Query data from database  -->
        <?php
            $restaurant_name = $_SESSION['restaurant_name'];
            $query_food = "SELECT order_id, customer_id, item_name, quantity, total_price, restaurant_name FROM order_details WHERE restaurant_name = '$restaurant_name'";
            $result_food = mysqli_query($conn, $query_food);
            $result_food_count = mysqli_num_rows($result_food);
            
            if($result_food_count > 0){
                while($row = mysqli_fetch_assoc($result_food)){

                    echo '
                    <div class="table">

                        <table>
                            <tr>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["quantity"].'</td>
                                <td>'.$row["total_price"].'</td>
                            </tr>
                        </table>
                    </div>';
                    // echo $row["restaurant_name"]; 
                }
            }
        ?>
           
    </section>
    <?php include("footer.html") ?>
</body>
</html>