<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Orders Management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="orders">
                        <td><input type="text" name="cus_id" placeholder="Type customer's ID" class="search-input"></td>
                        <td><input type="submit" value="Search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Food ID</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer ID</th>
                <th>Action</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='7' style='text-align: center;'>No orders found.</td></tr>";
                } else {
                    $stt = 1;
                    foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo htmlspecialchars($value['food_id']); ?></td>
                <td><?php echo htmlspecialchars($value['qty']); ?></td>
                <td><?php echo htmlspecialchars($value['order_date']); ?></td>
                <td><?php echo htmlspecialchars($value['status']); ?></td>
                <td><?php echo htmlspecialchars($value['customer_id']); ?></td>
                <td>
                    <a href="index.php?controller=orders&action=edit&id=<?php echo $value['id']; ?>" class="button-secondary"> Edit </a>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=orders&action=delete&id=<?php echo $value['id']; ?>" class="button-danger"> Delete </a>
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
