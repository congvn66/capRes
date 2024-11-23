<?php include('partials-front/menu.php');
include('data-access-front/orders-data.php');
 
?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class="container">

    <h2 class="text-center text-white">fill this form to confirm your order.</h2>

    <form action="" method="post" class="order">
      <fieldset>
        <legend>Selected Food</legend>

        <div class="food-menu-img">
          <?php
            if ($img_name_order == "") {
              ?>
              <img src="/capy-restaurant/images/default-food.png" width="100px" alt="Default Image">
              <?php
            } else {
              ?>
              <img src="<?php echo '/capy-restaurant/'; ?>images/food/<?php echo $img_name_order; ?>" alt="cant show" class="img-responsive img-curve">
              <?php
            }
          ?>
          
        </div>

        <div class="food-menu-desc">
          <h3><?php echo $name_order;?></h3>
          <input type = "hidden" name ="fid" value="<?php echo $food_id; ?>">
          <p class="food-price">$<?php echo $price_order; ?></p>

          <div class="order-label">Quantity</div>
          <label>
            <input type="number" name="qty" class="input-responsive" value="1" required>
          </label>

        </div>

      </fieldset>

      <fieldset>
        <legend>Delivery Details</legend>
        <div class="order-label">full name</div>
        <label>
          <input type="text" name="full-name" placeholder="E.g. capy" class="input-responsive" required>
        </label>

        <div class="order-label">phone number</div>
        <label>
          <input type="tel" name="contact" placeholder="Eg 09xx (if you have ordered more than 1 time, please type the same.)" class="input-responsive" required>
        </label>

        <div class="order-label">email</div>
        <label>
          <input type="email" name="email" placeholder="E.g. cap@gmail.com" class="input-responsive" required>
        </label>

        <div class="order-label">address</div>
        <label>
          <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
        </label>

        <input type="submit" name="submit" value="confirm order" class="btn btn-primary">
      </fieldset>
      
    </form>
    <?php include('data-access-front/orders-add.php');?>
  </div>
</section>
<!-- food search section ends -->


<?php include('partials-front/footer.php'); ?>