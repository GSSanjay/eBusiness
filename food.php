<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order your food</title>
    <link rel="stylesheet" href="css/food.css"/>
    <link rel="stylesheet" href="css/font.css"/>
    <!-- <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/> -->
    
</head>
<body>
    <!-- Header Section -->
    <main class="background">
        <?php include("logo.html") ?>
    </main>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>

    <!-- Secondary Section -->
    <!-- <form action="order.php" method="POST"> -->
        <section class="second-section">
            <h1 class="section-title secondary-heading">Order your favorite dish</h1>
            <div class="restaurants">

            <!-- Query data from database  -->
            <?php
                $query_food = "SELECT item_id, item_name, item_image, item_price, restaurant_name FROM food_item, restaurant WHERE food_item.restaurant_id = restaurant.restaurant_id";
                $result_food = mysqli_query($conn, $query_food);
                $result_food_count = mysqli_num_rows($result_food);
                
                if($result_food_count > 0){
                    while($row = mysqli_fetch_assoc($result_food)){
                        // echo $row["item_name"] . $row["item_image"] . $row["restaurant_name"]; 
                        echo '
                            <!--<form action="order.php" method="POST">-->
                                <article class="restaurant">
                                    <!--<form action="order.php" method="POST">-->
                                        <img src="'. $row["item_image"] .'" alt="">
                                        <h1 id="item_name">'. $row["item_name"] .'</h1>
                                        <p id="item_price"> &#x20B9;'.$row["item_price"].'</p>
                                        <p id="restaurant_name">'. $row["restaurant_name"] .'</p>
                                        <div class="quantity">
                                            <!--<button id="minus'.$row["item_id"].'" onclick="minus(this.id)">-</button>-->
                                            <input type="number" name="qty" id="qty" min="0" value="0"/>
                                            <!--<button id="plus'.$row["item_id"].'" onclick="plus(this.id)">+</button>-->
                                        </div>
                                        <div><button id="btn-order'.$row["item_id"].'" class="btn-order" onclick="submitOrder(this.id)">Order</button></div>
                                    <!--</form>-->
                                </article>
                            <!--</form>-->
                        ';
                    }
                }
                else{
                    echo "No results";
                }
                $conn->close();
            ?>
            </div>
        </section>
    <!-- </form> -->
  
    <!-- Footer Section -->
    <?php include("footer.html")?>
    <script src="js/inc-dec-item-count.js"></script>
    <script src="js/submit-order.js"></script>
</body>
</html>