<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>chef management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="chef">
                        <td><input type="text" name="name" placeholder="type chef's name" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- button add chef -->
        <a href="index.php?controller=chef&action=add" class="button-primary">add chef</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>full name</th>
                <th>salary</th>
                <th>image</th>
                <th>action</th>
            </tr>
            <?php
            if (empty($dataSearch)) {
                echo "<tr><td colspan='5' style='text-align: center;'>No chefs found.</td></tr>";
            } else {
                $stt = 1;
                foreach ($dataSearch as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['chef_name']; ?></td>
                <td><?php echo $value['salary']; ?></td>
                <td>
                    <?php
                    $img_name = $value['image_name'];
                    if ($img_name != "") {
                        ?>
                        <img src="/capy-restaurant/images/chef/<?php echo $img_name; ?>" width="100px" alt="Chef Image">
                        <?php
                    } else {
                        echo "<div>unknown</div>";
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=chef&action=edit&id=<?php echo $value['chef_id']; ?>" class="button-secondary"> edit </a>
                    <a onclick="return confirm('are you sure you want to delete?')" href="index.php?controller=chef&action=delete&id=<?php echo $value['chef_id']; ?>" class="button-danger"> delete </a>
                </td>
            </tr>
            <?php
                $stt++;
                }
            }
            ?>
        </table>
    </div>
</div>
<?php include "../footer.php"?>
