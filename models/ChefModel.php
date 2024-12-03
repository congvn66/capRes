<?php
    require_once 'BaseModel.php';

    class ChefModel extends BaseModel {
        const TABLE = 'chef';

        public function insertDataChef($chef_name, $salary, $image_name) {
            $chef_name = mysqli_real_escape_string($this->conn, $chef_name);
            $salary = mysqli_real_escape_string($this->conn, $salary);
            $image_name = mysqli_real_escape_string($this->conn, $image_name);
        
            $sql = "INSERT INTO chef(chef_id, chef_name, salary, image_name)
                    VALUES(null, '$chef_name', $salary, '$image_name')";
            return $this->_query($sql);
        }

        public function deleteChef($id) {
            $sql = "DELETE FROM " . self::TABLE . " WHERE chef_id = $id";
            return $this->_query($sql);
        }
    
        public function getAllChefs() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countAdmins() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getChefFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE chef_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateDataChef($id, $chef_name, $salary, $image_name) {
            $sql = "UPDATE chef SET chef_name = '$chef_name', salary = '$salary', image_name = '$image_name' WHERE chef_id = '$id'";
            return $this->_query($sql);
        }

        public function searchForChef($key)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE chef_name LIKE '%$key%'";
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
