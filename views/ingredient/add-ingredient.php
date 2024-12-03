<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new ingredient</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>ingredient's name: </td>
                    <td><input type="text" name="ingredient_name" placeholder="ingredient's city" required></td>
                </tr>
                <tr>
                    <td>description: </td>
                    <td><textarea name="description" cols="30" row="5" placeholder="description for the ingredient"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-ingredient" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> ingredient added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>