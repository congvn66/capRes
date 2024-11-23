<?php
    include 'db-connect-front.php';

    if(isset($_GET['food_id'])) {
        $food_id = $_GET['food_id'];
        $food_data = $db->getDataFromIdFood($food_id);
        
        if ($food_data != 0) {
            $name_order = $food_data['name'];
            $price_order = $food_data['price'];
            $img_name_order = $food_data['image_name'];
            
        } else {
            header('Location: http://localhost/capy-restaurant/');
        }
    } else {
        header('Location: http://localhost/capy-restaurant/');
    }
?>
