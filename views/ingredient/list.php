<?php include "../menu.php"?>
<div class="main-content">
    <div class="wrapper">
        <h1>Ingredient management</h1>
        <br><br>
        <div class="search-bar">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="ingredient">
                        <td><input type="text" name="name" placeholder="type ingredient's name" class="search-input"></td>
                        <td><input type="submit" value="search" class="search-btn"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
        <br><br><br>
        <!-- button add admin -->
        <a href="index.php?controller=ingredient&action=add" class="button-primary">add ingredient</a>
        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Ingredient's name</th>
                <th>Description</th>
                <th>Food's id</th>
                <th>Food's name</th>
                <th>Actions</th>
            </tr>
            <?php
                if (!isset($data) || !is_array($data) || count($data) === 0) {
                    echo "<tr><td colspan='6' style='text-align: center;'>No ingredient found.</td></tr>";
                } else {
                    $stt = 1; 
                    foreach($data as $value){
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['ingredient_name']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo htmlspecialchars($value['food_id']); ?></td>
                            <td><?php echo htmlspecialchars($value['name']); ?></td>
                            <td>
                                <a href="index.php?controller=ingredient&action=edit&id=<?php echo $value['ingredient_id']; ?>" class="button-secondary"> Edit </a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="index.php?controller=ingredient&action=delete&id=<?php echo $value['ingredient_id']; ?>" class="button-danger"> Delete </a>
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
