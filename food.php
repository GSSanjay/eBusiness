<?php
    session_start();

    if(!isset($_SESSION['customer_name'])){
        echo "You are logged out";
        header("location:customer-login.php");
    }
    else{
        $logout_btn = "<div class='logout'><a href='customer-logout.php'>Logout</a></div>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order your food</title>
    <link rel="stylesheet" href="css/food.css"/>
    <link rel="stylesheet" href="css/utils.css"/>
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
            <div class="first-row">
                <h4>Hey, <a href="customer.php" class="user-name"><?php echo $_SESSION['customer_name']; ?></a></h4>
                <h5>
                    <?php if($_SESSION['preference'] == "Veg") {
                        echo "Showing Veg Items";
                    } 
                    ?>
                </h5>
                <!-- <h6 id="success-msg"></h6> -->
                <?php echo $logout_btn ?>
            </div>
            <h1 class="section-title secondary-heading">Click on Order button to taste your favorite dish</h1>
            <div class="restaurants">

            <!-- Query data from database  -->
            
            <?php
                $query_food = "";
                // $customer_preference = $_SESSION['preference'];

                if(!isset($_SESSION['customer_name'])){
                    $query_food = "SELECT item_id, item_name, item_image, item_price, restaurant_name FROM food_item, restaurant WHERE food_item.restaurant_id = restaurant.restaurant_id";
                    // echo "if";
                }
                else {
                    $customer_preference = $_SESSION['preference'];
                    // echo $customer_preference;


                    // echo "else";
                    if($customer_preference == "Veg"){
                        // echo "if";

                        $query_food = "SELECT  distinct f.item_id, f.item_name, f.item_image, f.item_price, r.restaurant_name FROM food_item f, restaurant r, customer c WHERE f.restaurant_id = r.restaurant_id AND f.item_type = '$customer_preference'";
                    }
                    else{
                        // echo "else";

                        $query_food = "SELECT item_id, item_name, item_image, item_price, restaurant_name FROM food_item, restaurant WHERE food_item.restaurant_id = restaurant.restaurant_id";
                    }
                }

                // $query_food = "SELECT item_id, item_name, item_image, item_price, restaurant_name FROM food_item, restaurant WHERE food_item.restaurant_id = restaurant.restaurant_id";
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
                                        <div class="price"><p> &#x20B9;<p id="item_price">'.$row["item_price"].'</p></p></div>
                                        <p id="restaurant_name">'. $row["restaurant_name"] .'</p>
                                        <div class="quantity">
                                            <!--<button id="minus'.$row["item_id"].'" onclick="minus(this.id)">-</button>-->
                                            <input type="number" name="qty" id="qty" min="1" max="100" value="1" required/>
                                            <!--<button id="plus'.$row["item_id"].'" onclick="plus(this.id)">+</button>-->
                                        </div>
                                        <div><button type="submit" id="btn-order'.$row["item_id"].'" class="btn-order" onclick="submitOrder(this.id)">Order</button></div>
                                    <!--</form>-->
                                </article>
                            <!--</form>-->
                        ';
                    }
                }
                else{
                    echo "No items found";
                }
                $conn->close();
            ?>
            </div>
        </section>
    <!-- </form> -->
  
    <!-- Footer Section -->
    <?php include("footer.html")?>
    <!-- <script src="js/inc-dec-item-count.js"></script> -->
    <script src="js/submit-order.js"></script>
</body>
</html>