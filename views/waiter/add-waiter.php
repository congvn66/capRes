<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new waiter</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>waiter's name: </td>
                    <td><input type="text" name="waiter_name" placeholder="waiter's full name" required></td>
                </tr>
                <tr>
                    <td>salary: </td>
                    <td><input type="number" name="salary" placeholder="waiter's salary" required></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" placeholder="waiter's phone" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-waiter" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> waiter added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>