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
    <link rel="stylesheet" href="css/list-business.css" />
    <link rel="stylesheet" href="css/utils.css" />
</head>
<body>
    <?php include("logo.html") ?>

    <!-- Database connection -->
    <?php include("config/db-connect.php") ?>


    <section class="container">
        
        <div class="box2">
            <h2><a href = "user.php" class="user-name">User Home - <?php echo $_SESSION['username']; ?></a></h2>
            <h2>Business List</h2>
            <div class="logout"><a href="user-logout.php">Logout</a></div>
        </div>
             <!-- Query data from database  -->
        <?php
           
            $query_business = "SELECT * FROM business";
            $result_business = mysqli_query($conn, $query_business);
            $result_business_count = mysqli_num_rows($result_business);

            echo '
            <table class="table">
                <tr class="table-h">
                <td>Business Name</td>
                <td>Business Email</td>
                <td>Added on</td>
                </tr>
            </table>';
            
            if($result_business_count > 0){
                while($row = mysqli_fetch_assoc($result_business)){

                    echo '
                    <div class="table">

                        <table>
                            <tr>
                                <td>'.$row["business_name"].'</td>
                                <td>'.$row["business_email"].'</td>
                                <td>'.$row["business_addedon"].'</td>
                            </tr>
                        </table>
                    </div>';
                    // echo $row["business_name"]; 
                }
            }
            else{
                echo "<h2>No business found</h2>";
            }
        ?>
           
    </section>
    <?php include("footer.html") ?>
</body>
</html>