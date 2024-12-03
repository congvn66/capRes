<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit table</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Number: </td>
                    <td><input type="number" name="table_number" value="<?php echo $dataOnId['table_number'];?>"></td>
                </tr>
                <tr>
                    <td>Capacity: </td>
                    <td><input type="number" name="capacity" value="<?php echo $dataOnId['capacity'];?>"></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>
                        <select name="status">
                            <option <?php if($dataOnId['status'] == "Available"){echo "selected";}?> value="Available"> Available </option>
                            <option <?php if($dataOnId['status'] == "Booked"){echo "selected";}?> value="Booked"> Booked </option>
                            <option <?php if($dataOnId['status'] == "Not available"){echo "selected";}?> value="Not available"> Not available </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="edit-table" value="edit" class="button-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>