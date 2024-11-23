<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new chef</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>chef's name: </td>
                    <td><input type="text" name="chef_name" placeholder="chef's full name" required></td>
                </tr>
                <tr>
                    <td>salary: </td>
                    <td><input type="number" name="salary" placeholder="chef's salary" required></td>
                </tr>
                <tr>
                    <td>image: </td>
                    <td><input type="file" name="image" placeholder="chef's image"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-chef" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> chef added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>