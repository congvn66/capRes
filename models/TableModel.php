<?php
    require_once 'BaseModel.php';

    class TableModel extends BaseModel { 
        const TABLE = 'diningtable';

        public function insertDataTable($table_number, $capacity) {
            $sql = "INSERT INTO diningtable(table_id, table_number, capacity, status)
                    VALUES(null, $table_number, $capacity, 'Available')";
            return $this->_query($sql);
        }

        public function deleteDinningTable($id) {
            $sql = "DELETE FROM " . self::TABLE . " WHERE table_id = $id";
            return $this->_query($sql);
        }
    
        public function getAllDinningTables() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countDinningTables() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getTableFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE table_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateDataTable($id, $table_number, $capacity, $status) {
            $sql = "UPDATE diningtable SET table_number = $table_number, capacity = $capacity, status = '$status' WHERE table_id = '$id'";
            return $this->_query($sql);
        }

        public function searchForTable($num)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE table_number = $num";
        
           
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
