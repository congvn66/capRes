<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new ingredient</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>ingredient's name: </td>
                    <td><input type="text" name="ingredient_name" value="<?php echo $dataOnId['ingredient_name'];?>"></td>
                </tr>
                <tr>
                    <td>description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo htmlspecialchars($dataOnId['description']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Food: </td>
                    <td>
                    <select name="food_id">
                        <?php 
                        if (empty($dataOfFoods)) { 
                            ?>
                            <option value="1">No foods found.</option>
                            <?php
                        } else {
                            foreach ($dataOfFoods as $val) {
                                $id = $val['food_id'];
                                $food_name = $val['name']; 
                                ?>
                                <option <?php if($dataOnId['food_id'] == $id){echo "selected"; }?> value="<?php echo $id; ?>"><?php echo $food_name; ?></option>
                                <?php
                                
                            }
                            ?>
                            <option <?php if($dataOnId['food_id'] == null){echo "selected"; }?> value="<?php echo 'null'; ?>"><?php echo 'none'; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="edit-ingredient" value="edit" class="button-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>