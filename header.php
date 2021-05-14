<?php
    // session_start();

    if(!isset($_SESSION['customer_name'])){
   
            $header_menu = '<ul class="main-menu">
                          <button class="main-menu-btn">Login/Signup</button>
                          <div class="submenu">
                            <a href="user-login.php">Login</a>
                            <a href="user-signup.php">Signup</a>
                          </div>
                          </ul>';
    }
    else{
        
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
    <title>eBusiness</title>
    <?php include("utils.html"); ?>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/utils.css" />
  </head>
  <body>
    <header>
      <nav id="navbar">
        <a href="index.php"><h1 id="logo">e</h1></a>
  
        <?php echo $header_menu; ?>
      </nav>
    </header>
  </body>
</html>
