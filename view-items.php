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
    <link rel="stylesheet" href="css/add-item.css"/>
    <link rel="stylesheet" href="css/utils.css" />
    <title>Restaurant | View Items</title>
</head>
<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    ?>

    <?php
        // DB Connection
        include("config/db-connect.php");
        $form_error = "";
        $success_message = "";

      
            $restaurant_id = $_SESSION['restaurant_id'];            

            $query_items = "SELECT * FROM food_item WHERE restaurant id = '$restaurant_id'";
            $result_item = mysqli_query($conn, $query_items);

            $result_item_count = mysqli_num_rows($result_item);

            if($result_item_count > 0){
                while($row = mysqli_fetch_assoc($result_item)){
                    echo '
                            <!--<form action="order.php" method="POST">-->
                                <article class="restaurant">
                                    <!--<form action="" method="POST">-->
                                        <img src="'. $row["item_image"] .'" alt="">
                                        <h1 id="item_name">'. $row["item_name"] .'</h1>
                                        <p id="item_price"> &#x20B9;'.$row["item_price"].'</p>
                                        <!--<p id="restaurant_name">'. $row["restaurant_name"] .'</p>-->
                                        <!--<div class="quantity">
                                            <!--<button id="minus'.$row["item_id"].'" onclick="minus(this.id)">-</button>-->
                                            <!--<input type="number" name="qty" id="qty" min="1" max="100" value="1" required/>-->
                                            <!--<button id="plus'.$row["item_id"].'" onclick="plus(this.id)">+</button>-->
                                        </div>-->
                                        <!--<div><button type="submit" id="btn-order'.$row["item_id"].'" class="btn-order" onclick="submitOrder(this.id)">Order</button></div>-->
                                        <div><button name="submit" type="submit" id="btn-order'.$row["item_id"].'" class="btn-order" onclick="">Order</button></div>

                                    </form>
                                </article>
                            <!--</form>-->
                        ';
                }
            }



        
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php include("logo.html") ?>
        <div class="container">
            <div class="box2">
                <h2><a href="restaurant.php"?>Restaurant Home</a></h2>
                <h2>Hey, <?php echo $_SESSION['restaurant_name']; ?></h2>
            <!-- <div class="logout"><a href="restaurant-logout.php">Logout</a></div> -->
            </div>
            <div class="sub-container">
                <!-- <h4><?php echo $_SESSION["restaurant_name"].' <a href="restaurant.php">Home</a>'; ?></h4> -->
            </div>  
            <h2>Added Items</h2>
            <div class="box">
                <!-- <?php $success_message = $_GET["success_message"]; ?>
                <span class="success"><?php echo $success_message; ?></span> -->
                <!-- <span class="error"><?php echo $form_error; ?></span> -->
                <span><label for="item_name">Item Name</label><span class="error"></span></span>
                <input type="text" name="item_name" id="item_name" required/>
                <!-- <span><label for="item_image">Item Image</label><span class="error"></span></span>
                <input type="file" name="item_image" id="item_image" required/> -->
                <span><label for="item_price">Item Price</label><span class="error"></span></span>
                <input type="number" name="item_price" id="item_price" required/>
                <div class="preference">
                    <input type="radio" value="Veg" name="item_type" id="item_type" required>Veg</input>
                    <input type="radio" value="Non Veg" name="item_type" id="item_type" required>Non Veg</input>
                </div> 
                <form action="" method="POST" enctype="multipart/form-data">
                    <span><label for="item_image">Item Image</label><span class="error"></span></span>
                    <input type="file" name="image" />
                    <!-- <input type="submit"/> -->
                </form>
                <div>
                    <button type="submit" name="submit">Add Item</button>
                </div>
            </div>
        </div>
    </form>
    <!-- <script>location.reload(true);</script> -->
    <?php include("footer.html") ?>
</body>
</html>