<?php include('../menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h3>add new admin</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>full name: </td>
                    <td><input type="text" name="full_name" placeholder="your full name" required></td>
                </tr>
                <tr>
                    <td>username: </td>
                    <td><input type="text" name="username" placeholder="your username" required></td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" placeholder="your password" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-admin" value="add" class="button-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($success) && in_array('add-success', $success)) {
                echo "<p> admin added. </p>";
                unset($success);
            }
        ?>
    </div>
</div> 
<?php include('../footer.php');?>