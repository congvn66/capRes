<?php include('partials-front/menu.php'); ?>

<!-- food search section starts -->
<section class = "food-search text-center">
  <div class="container">

    <h2 class="text-center text-white">fill this form to confirm your order.</h2>

    <form action="#" class="order">
      <fieldset>
        <legend>Selected Food</legend>

        <div class="food-menu-img">
          <img src="images/pizza-menu.png" alt="margherita pizza" class="img-responsive img-curve">
        </div>

        <div class="food-menu-desc">
          <h3>margherita pizza</h3>
          <p class="food-price">$2.3</p>

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
          <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
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

  </div>
</section>
<!-- food search section ends -->


<?php include('partials-front/footer.php'); ?>