<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!--Responsive website-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>capy restaurant</title>

  <!-- link css file -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- navigation bar starts -->
<section class = "navbar">
  <div class = "container">
    <div class = "logo">
      <img src="./images/logo.png" alt = "restaurant logo" class="img-responsive">
    </div>

    <div class = "menu text-right">
      <ul>
        <li>
          <a href="index.php">home</a>
        </li>

        <li>
          <a href="foods.php">foods</a>
        </li>

        <li>
          <a href="chefs.php">chefs</a>
        </li>

        <li>
          <a href="#">contact us</a>
        </li>
      </ul>
    </div>

    <div class = "clearfix">

    </div>
  </div>
</section>
<!-- navigation bar ends -->

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class="container">

    <h2>Foods of <a href="#" class="text-white">"chef"</a></h2>

  </div>
</section>
<!-- food search section ends -->

<!-- menu section starts -->
<section class = "food-menu">
  <div class = "container">
    <h2 class="text-center">explore foods</h2>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/pizza-menu.png" alt="margherita pizza" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>margherita pizza</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="order.php" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/pizza-menu.png" alt="margherita pizza" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>margherita pizza</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="#" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/burger-menu.png" alt="smash burger" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>smash burger</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="#" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/burger-menu.png" alt="smash burger" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>smash burger</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="#" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/chicken-menu.png" alt="cp's chicken" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>cp's chicken</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="#" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class = "food-menu-box">
      <div class="food-menu-img">
        <img src="images/chicken-menu.png" alt="cp's chicken" class="img-responsive img-curve">
      </div>

      <div class="food-menu-desc">
        <h4>cp's chicken</h4>
        <p class="food-price">1$</p>
        <p class="food-detail">
          made with special sauce.
        </p>
        <br>

        <a href="#" class="button button-primary">order now !</a>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
  </div>
</section>
<!-- menu section ends -->

<?php include('partials-front/footer.php'); ?>