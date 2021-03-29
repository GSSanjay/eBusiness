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
    <title>Foodshala - Restaurant Menu Items</title>
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
            <h2>Restaurant Menu Items</h2>
            <div class="logout"><a href="restaurant-logout.php">Logout</a></div>
        </div>
             <!-- Query data from database  -->
        <?php
            $restaurant_name = $_SESSION['restaurant_name'];
            $query_food = "SELECT f.item_id, f.item_name, f.item_image, f.restaurant_id, f.item_price, f.item_type FROM food_item f, restaurant r WHERE f.restaurant_id = r.restaurant_id";
            $result_food = mysqli_query($conn, $query_food);
            $result_food_count = mysqli_num_rows($result_food);

            echo '
            <table class="table">
                <tr class="table-h">
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Item Type</td>
                </tr>
            </table>';
            
            if($result_food_count > 0){
                while($row = mysqli_fetch_assoc($result_food)){

                    echo '
                    <div class="table">

                        <table>
                            <tr>
                                <td>'.$row["item_name"].'</td>
                                <td>'.$row["item_price"].'</td>
                                <td>'.$row["item_type"].'</td>
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