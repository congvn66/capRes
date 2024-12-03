<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Tables Management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="table">
                        <td><input type="number" name="number" placeholder="Type table's number" class="search-input"></td>
                        <td><input type="submit" value="Search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- Button Add Admin -->
        <a href="index.php?controller=table&action=add" class="button-primary">Add table</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Number</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
                if (!isset($dataSearch) || !is_array($dataSearch) || count($dataSearch) === 0) {
                    echo "<tr><td colspan='4' style='text-align: center;'>No tables found.</td></tr>";
                } else {
                    $stt = 1;
                    foreach ($dataSearch as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo htmlspecialchars($value['table_number']); ?></td>
                <td><?php echo htmlspecialchars($value['capacity']); ?></td>
                <td><?php echo htmlspecialchars($value['status']); ?></td>
                <td>
                    <a href="index.php?controller=table&action=edit&id=<?php echo $value['table_id']; ?>" class="button-secondary"> Edit </a>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=table&action=delete&id=<?php echo $value['table_id']; ?>" class="button-danger"> Delete </a>
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
