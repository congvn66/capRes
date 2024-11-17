<?php include('partials-front/menu.php'); ?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class = "container">
    <form action = "food-search.php" method="POST">
      <input type = "search" name = "search" placeholder = "foodddddddddddd...." required>
      <input type = "submit" name = "submit" value = "search" class = "button button-primary">
    </form>
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