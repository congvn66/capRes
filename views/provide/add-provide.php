<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new provide</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Supplier: </td>
                    <td>
                    <select name="supplier_id">
                        <?php 
                        if (empty($dataOfSuppliers)) { 
                            ?>
                            <option value="1">No suppliers found.</option>
                            <?php
                        } else {
                            foreach ($dataOfSuppliers as $val) {
                                $id = $val['supplier_id'];
                                $supplier_name = $val['supplier_name']; 
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $supplier_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Ingredient: </td>
                    <td>
                    <select name="ingredient_id">
                        <?php 
                        if (empty($dataOfIngredients)) { 
                            ?>
                            <option value="1">No ingredients found.</option>
                            <?php
                        } else {
                            foreach ($dataOfIngredients as $val) {
                                $id = $val['ingredient_id'];
                                $ingredient_name = $val['ingredient_name']; 
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $ingredient_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-provide" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> provide added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>