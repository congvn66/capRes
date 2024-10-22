<?php include "menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>admin management</h1>
        <br><br><br>
        <!-- button add admin -->
        <a href="index.php?controller=admin&action=add" class="button-primary">add admin</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>full name</th>
                <th>username</th>
                <th>action</th>
            </tr>
            <?php
                $stt = 1;
                foreach($data as $value){
            ?>
            <tr>
                <td><?php echo $stt;?></td>
                <td><?php echo $value['full_name'];?></td>
                <td><?php echo $value['username'];?></td>
                <td>
                    <a href="index.php?controller=admin&action=edit&id=<?php echo $value['id'];?>" class="button-secondary"> edit </a>
                    <a href="index.php?controller=admin&action=delete&id=<?php echo $value['id'];?>" class="button-danger"> delete </a>
                </td>
            </tr>
            <?php
                $stt++;
                }
            ?>
        </table>
    </div>
</div>
    
<?php include "footer.php"?>
