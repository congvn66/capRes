<?php include('partials-front/menu.php');
include('data-access-front/fetch-chefs-chefs.php');
?>

<!-- chefs section starts -->
<section class="chefs">
        <div class="container">
            <h2 class="text-center">Our chefs</h2>
            <?php
                if ($chefsChefs != 0) {
                    foreach($chefsChefs as $chef) {
                        $id_chef = $chef['chef_id'];
                        $chef_name = $chef['chef_name'];
                        $img_name = $chef['image_name'];
                        ?>
                        <a href="http://localhost/capy-restaurant/chefs-foods.php?chef_id=<?php echo $id_chef;?>">
                            <div class = "box float-container">
                                <?php
                                    if ($img_name == "") {
                                        ?>
                                        <img src="/capy-restaurant/images/default-chef.png" alt="Default Image" class="img-responsive img-curve">
                                        <?php
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



<?php include('partials-front/footer.php'); ?>