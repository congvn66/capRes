<?php
require_once 'Database.php';

class FoodModel extends Database {
    public function getAllFoods() {
        $sql = "SELECT * FROM food";
        $result = $this->execute($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insertFood($food_name, $price, $chef_id, $image_name, $description) {
        $sql = "INSERT INTO food (food_id, name, price, chef_id, image_name, description)
                VALUES (NULL, '$food_name', $price, $chef_id, '$image_name', '$description')";
        return $this->execute($sql);
    }

    public function updateFood($id, $food_name, $price, $chef_id, $image_name, $description) {
        $sql = "UPDATE food SET name = '$food_name', price = $price, chef_id = $chef_id, image_name = '$image_name', description = '$description' WHERE food_id = $id";
        return $this->execute($sql);
    }

    public function deleteFood($id) {
        $sql = "DELETE FROM food WHERE food_id = $id";
        return $this->execute($sql);
    }
}
?>
