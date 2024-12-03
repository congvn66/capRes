<?php
    require_once 'BaseModel.php';

    class IngredientModel extends BaseModel {
        const TABLE = 'ingredient';

        public function insertDataIngredient($ingredient_name, $description) {
            $sql = "INSERT INTO ingredient(ingredient_id, ingredient_name, description, food_id)
                    VALUES(null, '$ingredient_name', '$description', null)";
            if ($this->_query($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }

        public function deleteIngredient($id) {
            $sql = "DELETE FROM ingredient WHERE ingredient_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllIngredients() {
            $sql = "SELECT ingredient.*, food.name FROM ingredient LEFT JOIN food ON ingredient.food_id = food.food_id";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
    
        public function countIngredients() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getIngredientsFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE ingredient_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateIngredients($id, $ingredient_name, $description, $food_id) {
            $sql = "UPDATE ingredient SET ingredient_name = '$ingredient_name', description = '$description', food_id = $food_id WHERE ingredient_id = $id";
            return $this->_query($sql);
        }

        public function searchForIngredient($key)
        {
            $sql = "SELECT ingredient.*, food.name FROM ingredient LEFT JOIN food ON ingredient.food_id = food.food_id
                    WHERE ingredient_name LIKE '%$key%'
                    OR ingredient.description LIKE '%$key%'";
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
