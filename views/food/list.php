<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>food management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="food">
                        <td><input type="text" name="name" placeholder="type food's name" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- button add admin -->
        <a href="index.php?controller=food&action=add" class="button-primary">add food</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>title</th>
                <th>price</th>
                <th>image</th>
                <th>description</th>
                <th>action</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='6' style='text-align: center;'>No food found.</td></tr>";
                } else {
                    $stt = 1; 
                    foreach($data as $value){
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['price']; ?></td>
                            <td>
                                <?php
                                $img_name = $value['image_name'];
                                if (!empty($img_name)) {
                                    ?>
                                    <img src="/capy-restaurant/images/food/<?php echo $img_name; ?>" width="100px" alt="Food Image">
                                    <?php
                                } else {
                                    ?>
                                    <img src="/capy-restaurant/images/default-food.png" width="100px" alt="Default Image">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($value['description']); ?></td>
                            <td>
                                <a href="index.php?controller=food&action=edit&id=<?php echo $value['food_id']; ?>" class="button-secondary"> Edit </a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=food&action=delete&id=<?php echo $value['food_id']; ?>" class="button-danger"> Delete </a>
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
