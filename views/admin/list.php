<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Admin Management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="admin">
                        <td><input type="text" name="name" placeholder="Type admin's name" class="search-input"></td>
                        <td><input type="submit" value="Search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- Button Add Admin -->
        <a href="index.php?controller=admin&action=add" class="button-primary">Add Admin</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='4' style='text-align: center;'>No admins found.</td></tr>";
                } else {
                    $stt = 1;
                    foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo htmlspecialchars($value['full_name']); ?></td>
                <td><?php echo htmlspecialchars($value['username']); ?></td>
                <td>
                    <a href="index.php?controller=admin&action=edit&id=<?php echo $value['id']; ?>" class="button-secondary"> Edit </a>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=admin&action=delete&id=<?php echo $value['id']; ?>" class="button-danger"> Delete </a>
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
