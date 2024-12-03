<?php 
include('partials-front/menu.php');
include('data-access-front/chefs-foods.php');
?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class="container">

    <h2>Foods of <a href="#" class="text-white">"<?php echo $c_name;?>"</a></h2>

  </div>
</section>
<!-- food search section ends -->

<!-- menu section starts -->
<section class = "food-menu">
  <div class = "container">
    <h2 class="text-center">Explore foods</h2>
    <?php
      if($f_list != 0) {
        foreach($f_list as $f) {
          $name_cf = $f['name'];
          $price_cf = $f['price'];
          $img_name_food_cf = $f['image_name'];
          $description_cf = $f['description'];
          ?>
          <div class = "food-menu-box">
            <div class="food-menu-img">
            <?php
                if ($img_name_food_cf == "") {
                  ?>
                  <img src="/capy-restaurant/images/default-food.png" width="100px" alt="Default Image">
                  <?php
                } else {
                    ?>
                    <img src="<?php echo '/capy-restaurant/'; ?>images/food/<?php echo $img_name_food_cf; ?>" alt="cant show" class="img-responsive img-curve">
                    <?php
                }
            ?>
            </div>

            <div class="food-menu-desc">
              <h4><?php echo $name_cf; ?></h4>
              <p class="food-price">$<?php echo $price_cf; ?></p>
              <p class="food-detail">
                <?php echo $description_cf;?>
              </p>
              <br>

              <a href="/capy-restaurant/order.php?food_id=<?php echo $f['food_id']; ?>" class="button button-primary">order now !</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <?php
        }
      } else {
        echo "<div>no food for this chef.</div>";
      }
    ?>
    <div class="clearfix"></div>
  </div>
</section>
<!-- menu section ends -->

<?php include('partials-front/footer.php'); ?>