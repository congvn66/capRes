<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit waiter</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>waiter's name: </td>
                    <td><input type="text" name="waiter_name" value="<?php echo $dataOnId['waiter_name'];?>"></td>
                </tr>
                <tr>
                    <td>salary: </td>
                    <td><input type="number" name="salary" value="<?php echo $dataOnId['salary'];?>"></td>
                </tr>
                <tr>
                    <td>phone: </td>
                    <td><input type="text" name="phone" value="<?php echo $dataOnId['phone'];?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="edit-waiter" value="edit" class="button-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>