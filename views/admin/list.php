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
                    <a href="" class="button-secondary"> edit </a>
                    <a href="" class="button-danger"> delete </a>
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
