<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>edit admin</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>full name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $dataOnId['full_name'];?>"></td>
                </tr>
                <tr>
                    <td>username: </td>
                    <td><input type="text" name="username" value="<?php echo $dataOnId['username'];?>"></td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" value="<?php echo $dataOnId['password'];?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="edit-admin" value="edit" class="button-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div> 
<?php include('../footer.php');?>