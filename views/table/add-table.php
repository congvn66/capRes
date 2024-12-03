<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new table</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Number: </td>
                    <td><input type="number" name="table_number" placeholder="table's number" required></td>
                </tr>
                <tr>
                    <td>Capacity: </td>
                    <td><input type="number" name="capacity" placeholder="table's capacity" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-table" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> table added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>