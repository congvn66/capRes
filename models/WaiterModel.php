<?php
    require_once 'BaseModel.php';

    class WaiterModel extends BaseModel { 
        const TABLE = 'waiter';

        public function insertDataWaiter($waiter_name, $salary, $phone) {
            $waiter_name = mysqli_real_escape_string($this->conn, $waiter_name);

            $sql = "INSERT INTO waiter(waiter_id, waiter_name, salary, phone)
                    VALUES(null, '$waiter_name', '$salary', '$phone')";
            return $this->_query($sql);
        }

        public function deleteWaiter($id) {
            $sql = "DELETE FROM " . self::TABLE . " WHERE waiter_id = $id";
            return $this->_query($sql);
        }
    
        public function getAllWaiters() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countWaiters() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getWaiterFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE waiter_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateDataWaiter($id, $waiter_name, $salary, $phone) {
            $sql = "UPDATE waiter SET waiter_name = '$waiter_name', salary = $salary, phone = '$phone' WHERE waiter_id = '$id'";
            return $this->_query($sql);
        }

        public function searchForWaiter($key)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE waiter_name LIKE '%$key%'";
        
           
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
