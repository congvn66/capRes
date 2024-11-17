<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>admin management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="admin">
                        <td><input type="text" name="name" placeholder="type admin's name" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
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
                    <a onclick="return confirm('are you sure you want to delete?')" href="index.php?controller=admin&action=delete&id=<?php echo $value['id'];?>" class="button-danger"> delete </a>
                </td>
            </tr>
            <?php
                $stt++;
                }
            ?>
        </table>
    </div>
</div>
    
<?php include "../footer.php"?>
