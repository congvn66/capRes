<?php
    require_once 'BaseModel.php';

    class AdminModel extends BaseModel { 
        const TABLE = 'admin';

        public function insertDataAdmin($full_name, $username, $password) {
            $full_name = mysqli_real_escape_string($this->conn, $full_name);
            $username = mysqli_real_escape_string($this->conn, $username);
            $password = mysqli_real_escape_string($this->conn, $password);
        
            $sql = "INSERT INTO admin(id, full_name, username, password)
                    VALUES(null, '$full_name', '$username', '$password')";
            return $this->_query($sql);
        }

        public function deleteAdmin($id) {
            $sql = "DELETE FROM " . self::TABLE . " WHERE id = $id";
            return $this->_query($sql);
        }
    
        public function getAllAdmins() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countAdmins() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getAdminFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateDataAdmin($id, $full_name, $username, $password) {
            $sql = "UPDATE admin SET full_name = '$full_name', username = '$username', password = '$password' WHERE id = '$id'";
            return $this->_query($sql);
        }

        public function searchForAdmin($key)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE full_name LIKE '%$key%' 
                       OR username LIKE '%$key%'";
        
           
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
