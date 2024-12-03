<?php
    require_once 'BaseModel.php';

    class FoodModel extends BaseModel {
        const TABLE = 'food';

        public function insertDataFood($food_name, $price, $chef_id, $image_name, $description) {
            $food_name = mysqli_real_escape_string($this->conn, $food_name);
            $image_name = mysqli_real_escape_string($this->conn, $image_name);
            $description = mysqli_real_escape_string($this->conn, $description);
        
            $sql = "INSERT INTO food(food_id, name, price, chef_id, image_name, description)
                    VALUES(null, '$food_name', $price, '$chef_id', '$image_name', '$description')";
            return $this->_query($sql);
        }

        public function deleteFood($id) {
            $sql = "DELETE FROM food WHERE food_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllFoods() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countFoods() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getFoodFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE food_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateFood($id, $food_name, $price, $image_name, $chefId, $description) {
            $sql = "UPDATE food SET name = '$food_name', price = '$price', chef_id = $chefId, image_name = '$image_name', description = '$description' WHERE food_id = '$id'";
            return $this->_query($sql);
        }

        public function searchForFood($key)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE name LIKE '%$key%'
                    OR description LIKE '%$key%'";
            $result = $this->_query($sql);
            $data = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
        
            return $data;
        }
    }
?>
