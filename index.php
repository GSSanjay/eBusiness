<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodshala</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/utils.css" />
    <!-- <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/> -->
    
</head>
<body>
    <!-- Main Section -->
    <main class="background">
        <!-- Header Section -->
        <?php include("header.html") ?>

        <section id="main-section">
            <div class="box">
                <h1 class="primary-heading">Ready to taste your favorite food..?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, quisquam.</p>
                <p>Lorem ipsum dolor Lorem ipsum dolor sit amet.</p>
                <a href="food.php"><button class="btn">Order Now</button></a>
            </div>
        </section>
    </main>

    <!-- Secondary Section -->
    <section class="second-section">
        <h1 class="section-title secondary-heading">Popular dishes that people like to order from us</h1>
        <div class="restaurants">
            <article class="restaurant">
                <img src="images/1.jpg" alt="">
                <div class="restaurant-details">
                    <h1 class="">Restaurant 1</h1>
                    <p>Lorem ipsum dolor Lorem ipsum dolor sit amet.</p>
                </div>
            </article> 
            <article class="restaurant">
                <img src="images/1.jpg" alt="">
                <div class="restaurant-details">
                    <h1 class="">Restaurant 1</h1>
                    <p>Lorem ipsum dolor Lorem ipsum dolor sit amet.</p>
                </div>
            </article>
            <article class="restaurant">
                <img src="images/1.jpg" alt="">
                <div class="restaurant-details">
                    <h1 class="">Restaurant 1</h1>
                    <p>Lorem ipsum dolor Lorem ipsum dolor sit amet.</p>
                </div>
            </article> 
        </div>
        <div class="more-link"><a href="food.php">Explore dishes to order</a></div> 
    </section>
  
    <!-- Footer Section -->
    <?php include("footer.html")?>
</body>
</html>