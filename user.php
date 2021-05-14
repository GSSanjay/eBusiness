<?php
    session_start();

    if(!isset($_SESSION['username'])){
        echo "You are logged out";
        header("location:user-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBusiness</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/user-home.css" />
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php include("logo.html") ?>
    <section class="container">
        
        <div class="box2">
            <h2>User Home</h2>
            <h2><?php echo $_SESSION['username']; ?></h2>
            <div class="logout"><a href="user-logout.php">Logout</a></div>
        </div>
        <div class="box1">
            <ul>
                <li><a href="list-users.php">List Users</a></li>
                <li><a href="add-business.php">Add Business</a></li>
                <li><a href="list-business.php">List Businesses </a></li>
            </ul>
        </div>

    </section>
    <?php include("footer.html") ?>
</body>
</html>