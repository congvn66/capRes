<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Account management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="account">
                        <td><input type="text" name="name" placeholder="" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- button add admin -->
        <a href="index.php?controller=account&action=add" class="button-primary">add account</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Customer's id</th>
                <th>Customer's name</th>
                <th>Actions</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='6' style='text-align: center;'>No accounts found.</td></tr>";
                } else {
                    $stt = 1; 
                    foreach($data as $value){
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['customer_id']; ?></td>
                            <td><?php echo htmlspecialchars($value['customer_name']); ?></td>
                            <td>
                                <a href="index.php?controller=account&action=edit&id=<?php echo $value['account_id']; ?>" class="button-secondary"> Edit </a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=account&action=delete&id=<?php echo $value['account_id']; ?>" class="button-danger"> Delete </a>
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
