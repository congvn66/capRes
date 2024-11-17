<?php 
include('partials-front/menu.php');
include('data-access-front/fetch-chefs.php');
?>

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

    <!-- chefs section starts -->
    <!-- chefs section starts -->
    <section class="chefs">
        <div class="container">
            <h2 class="text-center">Our chefs</h2>
            <?php
                if ($chefs != 0) {
                    foreach($chefs as $chef) {
                        $id = $chef['chef_id'];
                        $chef_name = $chef['chef_name'];
                        $img_name = $chef['image_name'];
                        ?>
                        <a href="chefs-foods.php">
                            <div class = "box float-container">
                                <?php
                                    if ($img_name == "") {
                                        echo "<div>image not available.</div>";
                                    } else {
                                        ?>
                                            <img src="<?php echo 'http://localhost/capy-restaurant/'; ?>images/chef/<?php echo $img_name; ?>" alt="capy chef 1" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                <h3 class="float-text text-amazingColor"><?php echo $chef_name; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                } else {
                    echo "<div>no chefs found.</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- chefs section ends -->

    <!-- chefs section ends -->

    <!-- menu section starts -->
    <section class = "food-menu">
        <div class = "container">
            <h2 class="text-center">Explore foods</h2>

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

            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- menu section ends -->
<?php include('partials-front/footer.php'); ?>