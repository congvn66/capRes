<?php include('menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit chef</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>chef's name: </td>
                    <td><input type="text" name="chef_name" value="<?php echo $dataOnId['full_name'];?>"></td>
                </tr>
                <tr>
                    <td>salary: </td>
                    <td><input type="number" name="salary" value="<?php echo $dataOnId['username'];?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="edit-chef" value="edit" class="button-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('footer.php');?>