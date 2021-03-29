<?php
    session_start();
    if(!isset($_SESSION['customer_name'])){
        // echo "You need to login to place your order. Redirecting to login page...";
        // header("location:customer-login.php");
        // header("Refresh: 5; url=customer-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodshala - Home</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/food.css"/>
    <link rel="stylesheet" href="css/utils.css" />
    <!-- <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/> -->
    
</head>
<body>
    <!-- Main Section -->
    <main class="background">
        <!-- Header Section -->
        <?php include("header.php") ?>

        <section id="main-section">
            <div class="box">
                <h1 class="primary-heading">Ready to taste your favorite food..?</h1>
                <p>Hungry? Then why don’t you treat yourself to one of our delicious collection of dishes</p>
                <a href="food.php"><button class="btn">Order Now</button></a>
            </div>
        </section>
    </main>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>

    <?php
        if(isset($_POST["submit"])){
             if(!isset($_SESSION['customer_name'])){
                // echo "You need to login to place your order. Redirecting to login page...";
                // header("location:customer-login.php");
                // header("Refresh: 5; url=customer-login.php");
                header("Refresh: 0; url=customer-login.php");
            }
            else{
                header("location:food.php");
            }
        }
    ?>

    <!-- Secondary Section -->
    <!-- <form action="order.php" method="POST"> -->
    <section class="second-section">
            <div class="first-row">
                <!-- <h4>Hey, <?php //echo $_SESSION['customer_name']; ?></h4> -->
                <?php //echo $logout_btn ?>
            </div>
            <h1 class="section-title">Showing our menu</h1>
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
                                    <form action="" method="POST">
                                        <img src="'. $row["item_image"] .'" alt="">
                                        <h1 id="item_name">'. $row["item_name"] .'</h1>
                                        <p id="item_price"> &#x20B9;'.$row["item_price"].'</p>
                                        <p id="restaurant_name">'. $row["restaurant_name"] .'</p>
                                        <div class="quantity">
                                            <!--<button id="minus'.$row["item_id"].'" onclick="minus(this.id)">-</button>-->
                                            <!--<input type="number" name="qty" id="qty" min="1" max="100" value="1" required/>-->
                                            <!--<button id="plus'.$row["item_id"].'" onclick="plus(this.id)">+</button>-->
                                        </div>
                                        <!--<div><button type="submit" id="btn-order'.$row["item_id"].'" class="btn-order" onclick="submitOrder(this.id)">Order</button></div>-->
                                        <div><button name="submit" type="submit" id="btn-order'.$row["item_id"].'" class="btn-order" onclick="">Order</button></div>

                                    </form>
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
  
    <!-- Footer Section -->
    <?php include("footer.html")?>
    <script>
        const redirect_to_login = () => {
            window.location.href="customer-login.php";
        }
        const redirect_to_food = () => {
            window.location.href="food.php";
        }
    </script>
</body>
</html>