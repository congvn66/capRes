<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new food</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>title: </td>
                    <td><input type="text" name="food_name" placeholder="food's title" required></td>
                </tr>
                <tr>
                    <td>price: </td>
                    <td><input type="number" name="price" placeholder="food's price" required></td>
                </tr>
                <tr>
                    <td>description: </td>
                    <td><textarea name="description" cols="30" row="5" placeholder="description for the food"></textarea></td>
                </tr>
                <tr>
                    <td>image: </td>
                    <td><input type="file" name="image" placeholder="food's image"></td>
                </tr>
                <tr>
                    <td>chef: </td>
                    <td>
                    <select name="chef">
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
                                <option value="<?php echo $id; ?>"><?php echo $chef_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-food" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> food added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>