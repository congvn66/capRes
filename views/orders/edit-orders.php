<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit food</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>food's id: </td>
                    <td><b><?php echo $dataOnId['food_id']; ?></b></td>
                </tr>
                <tr>
                    <td>quantity: </td>
                    <td><input type="number" name="qty" value="<?php echo $dataOnId['qty'];?>"></td>
                </tr>

                <tr>
                    <td>status</td>
                    <td>
                        <select name="status">
                            <option <?php if($dataOnId['status'] == "ordered"){echo "selected";}?> value="ordered"> ordered </option>
                            <option <?php if($dataOnId['status'] == "on delivery"){echo "selected";}?> value="on delivery"> on delivery </option>
                            <option <?php if($dataOnId['status'] == "delivered"){echo "selected";}?> value="delivered"> delivered </option>
                            <option <?php if($dataOnId['status'] == "cancelled"){echo "selected";}?> value="cancelled"> cancelled </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>customer's id:</td>
                    <td><b><?php echo $dataOnId['customer_id'];?></b></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $dataOnId['id'];?>">
                        <input type="submit" name="edit-orders" value="edit" class="button-secondary">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>