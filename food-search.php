<?php include('partials-front/menu.php');
include('data-access-front/food-search.php');
?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class="container">

    <h2>Foods on your search <a href="#" class="text-white">"<?php echo $searchKey; ?>"</a></h2>

  </div>
</section>
<!-- food search section ends -->

<!-- menu section starts -->
<section class = "food-menu">
  <div class = "container">
    <h2 class="text-center">Explore foods</h2>
    <?php
      if ($searches != 0) {
        foreach($searches as $search) {
          $id_search = $search['food_id'];
          $food_name_search = $search['name'];
          $price_search = $search['price'];
          $description_search = $search['description'];
          $img_name_food_search = $search['image_name'];
          ?>
          <div class = "food-menu-box">
            <div class="food-menu-img">
            <?php
                if ($img_name_food_search == "") {
                  ?>
                  <img src="/capy-restaurant/images/default-food.png"  alt="Default Image" class="img-responsive img-curve">
                  <?php
                } else {
                    ?>
                    <img src="<?php echo 'http://localhost/capy-restaurant/'; ?>images/food/<?php echo $img_name_food_search; ?>" alt="cant show" class="img-responsive img-curve">
                    <?php
                }
            ?>
            </div>

            <div class="food-menu-desc">
              <h4><?php echo $food_name_search; ?></h4>
              <p class="food-price">$<?php echo $price_search; ?></p>
              <p class="food-detail">
                <?php echo $description_search; ?>
              </p>
              <br>

              <a href="http://localhost/capy-restaurant/order.php?food_id=<?php echo $id_food; ?>" class="button button-primary">order now !</a>
            </div>

            <div class="clearfix"></div>
          </div>
          <?php
        }
      } else {
        echo "<div>food not found.</div>";
      }
    ?>
    <div class="clearfix"></div>
  </div>
</section>
<!-- menu section ends -->

<?php include('partials-front/footer.php'); ?>