<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit customer</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>supplier's city: </td>
                    <td><input type="text" name="supplier_city" value="<?php echo $dataOnId['supplier_city'];?>"></td>
                </tr>
                <tr>
                    <td>supplier's name: </td>
                    <td><input type="text" name="supplier_name" value="<?php echo $dataOnId['supplier_name'];?>"></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" value="<?php echo $dataOnId['phone'];?>"></td>
                </tr>

                <tr>
                    <td>chef: </td>
                    <td>
                    <select name="chef_id">
                        <?php 
                        if (empty($dataOfChefs)) { 
                            ?>
                            <option value="1">No chef found.</option>
                            <?php
                        } else {
                            foreach ($dataOfChefs as $val) {
                                $id = $val['chef_id'];
                                $chef_name = $val['chef_name']; 
                                ?>
                                <option <?php if($dataOnId['chef_id'] == $id){echo "selected"; }?> value="<?php echo $id; ?>"><?php echo $chef_name; ?></option>
                                <?php
                                
                            }
                            ?>
                            <option <?php if($dataOnId['chef_id'] == null){echo "selected"; }?> value="<?php echo 'null'; ?>"><?php echo 'none'; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="edit-supplier" value="edit" class="button-secondary">
                    </td>
                </tr>
                
                
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>