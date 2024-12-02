<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>supplier management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="supplier">
                        <td><input type="text" name="name" placeholder="type supplier's name" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- button add admin -->
        <a href="index.php?controller=supplier&action=add" class="button-primary">add supplier</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Supplier's city</th>
                <th>Supplier's name</th>
                <th>Phone</th>
                <th>Chef's id</th>
                <th>Chef's name</th>
                <th>Actions</th>
            </tr>
            <?php
                if (!isset($dataSearch) || !is_array($dataSearch) || count($dataSearch) === 0) {
                    echo "<tr><td colspan='6' style='text-align: center;'>No supplier found.</td></tr>";
                } else {
                    $stt = 1; 
                    foreach($dataSearch as $value){
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['supplier_city']; ?></td>
                            <td><?php echo $value['supplier_name']; ?></td>
                            <td><?php echo $value['phone']; ?></td>
                            <td><?php echo htmlspecialchars($value['chef_id']); ?></td>
                            <td><?php echo htmlspecialchars($value['chef_name']); ?></td>
                            <td>
                                <a href="index.php?controller=supplier&action=edit&id=<?php echo $value['supplier_id']; ?>" class="button-secondary"> Edit </a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=supplier&action=delete&id=<?php echo $value['supplier_id']; ?>" class="button-danger"> Delete </a>
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
