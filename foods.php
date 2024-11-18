<?php include('partials-front/menu.php');
include('data-access-front/fetch-foods-foods.php');
?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class = "container">
    <form action = "http://localhost/capy-restaurant/food-search.php" method="POST">
      <input type = "search" name = "search" placeholder = "foodddddddddddd...." required>
      <input type = "submit" name = "submit" value = "search" class = "button button-primary">
    </form>
  </div>
</section>
<!-- food search section ends -->



<!-- menu section starts -->
<section class = "food-menu">
        <div class = "container">
            <h2 class="text-center">Explore foods</h2>

            
            <?php
                if ($foodsFoods != 0) {
                    foreach($foodsFoods as $food) {
                        $id_food = $food['food_id'];
                        $food_name = $food['name'];
                        $img_name_food = $food['image_name'];
                        $price = $food['price'];
                        $description = $food['description'];
                        ?>
                        <div class = "food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if ($img_name_food == "") {
                                        echo "<div>no image.</div>";
                                    } else {
                                        ?>
                                        <img src="<?php echo 'http://localhost/capy-restaurant/'; ?>images/food/<?php echo $img_name_food; ?>" alt="cant show" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $food_name;?></h4>
                                <p class="food-price">$<?php echo $price;?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="order.php" class="button button-primary">order now !</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div>no foods found.</div>";
                }
            ?>
            

            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- menu section ends -->

<?php include('partials-front/footer.php'); ?>