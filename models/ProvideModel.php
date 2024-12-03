<?php
    require_once 'BaseModel.php';

    class ProvideModel extends BaseModel {
        const TABLE = 'provides';

        public function insertDataProvide($supplier_id, $ingredient_id) {
            $sql = "INSERT INTO provides(provide_id, supplier_id, ingredient_id)
                    VALUES(null, $supplier_id, $ingredient_id)";
            if ($this->_query($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }

        public function deleteProvide($id) {
            $sql = "DELETE FROM provides WHERE provide_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllProvides() {
            $sql = "SELECT provides.*, supplier.supplier_name, ingredient.ingredient_name FROM
	        provides LEFT JOIN supplier ON provides.supplier_id = supplier.supplier_id
    		LEFT JOIN ingredient ON provides.ingredient_id = ingredient.ingredient_id";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
    
        public function countProvides() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getProvideFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE provide_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateProvides($id, $supplier_id, $ingredient_id) {
            $sql = "UPDATE provides SET supplier_id = $supplier_id, ingredient_id = $ingredient_id WHERE provide_id = $id";
            return $this->_query($sql);
        }

        public function searchForProvide($key)
        {
            $sql = "SELECT provides.*, supplier.supplier_name, ingredient.ingredient_name FROM
	        provides LEFT JOIN supplier ON provides.supplier_id = supplier.supplier_id
    		LEFT JOIN ingredient ON provides.ingredient_id = ingredient.ingredient_id
                    WHERE ingredient_name LIKE '%$key%'
                    OR supplier_name LIKE '%$key%'";
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
