<?php
    session_start();

    session_destroy();

    header("location:restaurant-login.php");
?>