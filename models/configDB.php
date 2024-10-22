<?php
    class Database {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db_name = 'capy-restaurant';

        private $conn = null;
        private $res = null;

        public function connect() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if (!$this->conn) {
                echo "failed to connect to database";
                exit();
            } else {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        public function execute($sql) {
            $this->res = $this->conn->query($sql);
            return $this->res;
        }

        public function getData() {
           
            if($this->res) {
                $data = mysqli_fetch_array($this->res);
            } else {
                $data = 0;
            }
            return $data;
        }

        public function getAllData($tbl) {
            $sql = "SELECT * FROM $tbl";
            $this->execute($sql);
            if ($this->cnt_rows()==0) {
                $data = 0;
            } else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function getDataFromID($tbl, $id) {
            $sql = "SELECT * FROM $tbl WHERE id = $id";
            $this->execute($sql); 
            if($this->cnt_rows() != 0) {
                $data = mysqli_fetch_array($this->res);
            } else {
                $data = 0;
            }
            return $data;
        }

        public function cnt_rows(){
            if ($this->res) {
                $num = mysqli_num_rows($this->res);
            } else {
                $num = 0;
            }
            return $num;
        }

        public function insertDataAdmin($full_name, $username, $password) {
            $sql = "INSERT INTO admin(id, full_name, username, password)VALUES(null, '$full_name', '$username', '$password')";
            return $this->execute($sql);
        }
        
        public function updateDataAdmin($id, $full_name, $username, $password) {
            $sql = "UPDATE admin SET full_name = '$full_name', username = '$username', password = '$password' WHERE id = '$id'";
            return $this->execute($sql);
        }

        public function deleteAdmin($id) {
            $sql = "DELETE FROM admin WHERE id = '$id'";
            return $this->execute($sql);
        }
    }
?>