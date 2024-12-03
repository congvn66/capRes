<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit customer</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>customer's name: </td>
                    <td><input type="text" name="customer_name" value="<?php echo $dataOnId['customer_name'];?>"></td>
                </tr>
                <tr>
                    <td>address: </td>
                    <td><input type="text" name="address" value="<?php echo $dataOnId['address'];?>"></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" value="<?php echo $dataOnId['phone'];?>"></td>
                </tr>

                <tr>
                    <td>email: </td>
                    <td><input type="text" name="email" value="<?php echo $dataOnId['email'];?>"></td>
                </tr>

                <tr>
                    <td>waiter: </td>
                    <td>
                    <select name="waiter_id">
                        <?php 
                        if (empty($dataOfWaiters)) { 
                            ?>
                            <option value="1">No waiter found.</option>
                            <?php
                        } else {
                            foreach ($dataOfWaiters as $val) {
                                $id = $val['waiter_id'];
                                $waiter_name = $val['waiter_name']; 
                                ?>
                                <option <?php if($dataOnId['waiter_id'] == $id){echo "selected"; }?> value="<?php echo $id; ?>"><?php echo $waiter_name; ?></option>
                                
                                <?php
                                
                            }
                            ?>
                            <option <?php if($dataOnId['waiter_id'] == null){echo "selected"; }?> value="<?php echo 'null'; ?>"><?php echo 'none'; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="edit-customer" value="edit" class="button-secondary">
                    </td>
                </tr>
                
                
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>