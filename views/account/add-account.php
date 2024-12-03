<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new provide</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="customer's username" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="customer's password" required></td>
                </tr>
                <tr>
                    <td>Customer: </td>
                    <td>
                    <select name="customer_id">
                        <?php 
                        if (empty($dataOfCustomers)) { 
                            ?>
                            <option value="1">No customers found.</option>
                            <?php
                        } else {
                            foreach ($dataOfCustomers as $val) {
                                $id = $val['customer_id'];
                                $customer_name = $val['customer_name']; 
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $customer_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-account" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> account added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>