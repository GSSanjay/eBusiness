<?php
    include("config/db-connect.php");

    $item_name = $_GET["item_name"];
    $restaurant_name = $_GET["restaurant_name"];
    $qty = $_GET["qty"];
    $item_price = $_GET["item_price"];

    echo $item_name. " ";
    echo $restaurant_name. " ";
    echo $qty;
    echo $item_price;
    
?>