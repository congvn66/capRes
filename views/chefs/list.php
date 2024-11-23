<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Chefs Management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="chef">
                        <td><input type="text" name="name" placeholder="Type chef's name" class="search-input"></td>
                        <td><input type="submit" value="Search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- Button Add Chef -->
        <a href="index.php?controller=chef&action=add" class="button-primary">Add Chef</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Salary</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='5' style='text-align: center;'>No chefs found.</td></tr>";
                } else {
                    $stt = 1;
                    foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo htmlspecialchars($value['chef_name']); ?></td>
                <td><?php echo $value['salary']; ?> </td>
                <td>
                    <?php
                    $img_name = $value['image_name'];
                    if (!empty($img_name)) {
                        ?>
                        <img src="/capy-restaurant/images/chef/<?php echo htmlspecialchars($img_name); ?>" width="100px" alt="Chef Image">
                        <?php
                    } else {
                        ?>
                        <img src="/capy-restaurant/images/default-chef.png" width="100px" alt="Default Image">
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=chef&action=edit&id=<?php echo $value['chef_id']; ?>" class="button-secondary"> Edit </a>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=chef&action=delete&id=<?php echo $value['chef_id']; ?>" class="button-danger"> Delete </a>
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
