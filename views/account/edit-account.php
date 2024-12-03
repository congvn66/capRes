<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit account</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>username: </td>
                    <td><input type="text" name="username" value="<?php echo $dataOnId['username'];?>"></td>
                </tr>

                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" value="<?php echo $dataOnId['password'];?>"></td>
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
                                <option <?php if($dataOnId['customer_id'] == $id){echo "selected"; }?> value="<?php echo $id; ?>"><?php echo $customer_name; ?></option>
                                <?php
                                
                            }
                        }
                        ?>
                    </select>

                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="edit-account" value="edit" class="button-secondary">
                    </td>
                </tr>
                
                
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>