<?php
    // session_start();

    if(!isset($_SESSION['customer_name'])){
        // echo "You are logged out";
        // header("location:customer-login.php");
        $header_menu = "<ul id='nav-items'>
                <li><a href='customer-login.php'>Login</a></li>
                <li><a href='customer-signup.php'>Signup</a></li>
              </ul>";
    }
    else{
        // $logout_btn = "<div class='logout'><a href='customer-logout.php'>Logout</a></div>";
        // echo "<style>#nav-items{display:none};</style>";
        $header_menu = "<ul id='nav-items-login'>
                <li>Hey, <a class='user-name' href='customer.php'>". $_SESSION['customer_name'] ."</a></li>
                <li><a class='logout-btn' href='customer-logout.php'>Logout</a></li>
              </ul>";
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/utils.css" />
  </head>
  <body>
    <header>
      <nav id="navbar">
        <a href="index.php"><h1 id="logo">food</h1></a>
        <!-- <ul id="nav-items">
          <li><a href="customer-login.php">Login</a></li>
          <li><a href="customer-signup.php">Signup</a></li>
        </ul> -->
        <?php echo $header_menu; ?>
      </nav>
    </header>
  </body>
</html>
