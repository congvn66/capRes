<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit food</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>food's name: </td>
                    <td><input type="text" name="name" value="<?php echo $dataOnId['name'];?>"></td>
                </tr>
                <tr>
                    <td>price: </td>
                    <td><input type="number" name="price" value="<?php echo $dataOnId['price'];?>"></td>
                </tr>
                <tr>
                    <td>description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo htmlspecialchars($dataOnId['description']); ?></textarea>
                    </td>
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
                                <option <?php if($dataOnId['chef_id'] == $id){echo "selected"; }?> value="<?php echo $id; ?>"><?php echo $chef_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    </td>
                </tr>
                <tr>
                    <td>current image: </td>
                    <td>
                        <?php
                            if($dataOnId['image_name'] != "") {
                                ?>
                                <img src="/capy-restaurant/images/food/<?php echo $dataOnId['image_name']; ?>" width="100px" alt="Food Image">
                                <?php
                            } else {
                                echo "<div> didnt add image. </div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>new image: </td>
                    <td><input type="file" name="image" value=""></td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="edit-food" value="edit" class="button-secondary">
                        <input type="hidden" name="current_image" value="<?php echo $dataOnId['image_name']?>">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>