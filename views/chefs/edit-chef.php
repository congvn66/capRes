<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit chef</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>chef's name: </td>
                    <td><input type="text" name="chef_name" value="<?php echo $dataOnId['chef_name'];?>"></td>
                </tr>
                <tr>
                    <td>salary: </td>
                    <td><input type="number" name="salary" value="<?php echo $dataOnId['salary'];?>"></td>
                </tr>
                <tr>
                    <td>current image: </td>
                    <td>
                        <?php
                            if($dataOnId['image_name'] != "") {
                                ?>
                                <img src="/capy-restaurant/images/chef/<?php echo $dataOnId['image_name']; ?>" width="100px" alt="Chef Image">
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
                        <input type="submit" name="edit-chef" value="edit" class="button-secondary">
                        <input type="hidden" name="current_image" value="<?php echo $dataOnId['image_name']?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>