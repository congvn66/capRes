<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new supplier</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>supplier's city: </td>
                    <td><input type="text" name="supplier_city" placeholder="supplier's city" required></td>
                </tr>
                <tr>
                    <td>supplier's name: </td>
                    <td><input type="text" name="supplier_name" placeholder="supplier's name" required></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" placeholder="supplier's phone" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-supplier" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> supplier added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>