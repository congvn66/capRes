<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new customer</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>customer's name: </td>
                    <td><input type="text" name="customer_name" placeholder="customer's full name" required></td>
                </tr>
                <tr>
                    <td>address: </td>
                    <td><input type="text" name="address" placeholder="customer's address" required></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" placeholder="customer's phone" required></td>
                </tr>
                <tr>
                    <td>email: </td>
                    <td><input type="text" name="email" placeholder="customer's email" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-customer" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> customer added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>