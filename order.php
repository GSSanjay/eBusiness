<?php
    session_start();
    if(!isset($_SESSION['customer_name'])){
        echo "You need to login to place your order. Redirecting to login page...";
        // header("location:customer-login.php");
        header("Refresh: 5; url=customer-login.php");
    }
    else{
        include("config/db-connect.php");

        $item_name = $_GET["item_name"];
        $restaurant_name = $_GET["restaurant_name"];
        $qty = $_GET["qty"];
        $item_price = $_GET["item_price"];

        echo $item_name. " ";
        echo $restaurant_name. " ";
        echo $qty;
        echo $item_price;
    }
?>