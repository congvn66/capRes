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

        public function getDataFromIdChef($id) {
            $sql = "SELECT * FROM chef WHERE chef_id = $id";
            $this->execute($sql); 
            if($this->cnt_rows() != 0) {
                $data = mysqli_fetch_array($this->res);
            } else {
                $data = 0;
            }
            return $data;
        }

        public function getDataFromIdFood($id) {
            $sql = "SELECT * FROM food WHERE food_id = $id";
            $this->execute($sql); 
            if($this->cnt_rows() != 0) {
                $data = mysqli_fetch_array($this->res);
            } else {
                $data = 0;
            }
            return $data;
        }

        public function insertDataAdmin($full_name, $username, $password) {
            $sql = "INSERT INTO admin(id, full_name, username, password)VALUES(null, '$full_name', '$username', '$password')";
            return $this->execute($sql);
        }

        public function insertDataChef($chef_name, $salary, $image_name) {
            $sql = "INSERT INTO chef(chef_id, chef_name, salary, image_name)VALUES(null, '$chef_name', $salary, '$image_name')";
            return $this->execute($sql);
        }

        public function insertDataFood($food_name, $price, $chef_id, $image_name, $description) {
            $sql = "INSERT INTO food(food_id, name, price, chef_id, image_name, description)VALUES(null, '$food_name', $price, '$chef_id', '$image_name', '$description')";
            return $this->execute($sql);
        }
        
        public function updateDataAdmin($id, $full_name, $username, $password) {
            $sql = "UPDATE admin SET full_name = '$full_name', username = '$username', password = '$password' WHERE id = '$id'";
            return $this->execute($sql);
        }

        public function updateDataChef($id, $chef_name, $salary, $image_name) {
            $sql = "UPDATE chef SET chef_name = '$chef_name', salary = '$salary', image_name = '$image_name' WHERE chef_id = '$id'";
            return $this->execute($sql);
        }

        public function updateDataFood($id, $food_name, $price, $image_name, $chefId, $description) {
            $sql = "UPDATE food SET name = '$food_name', price = '$price', chef_id = $chefId, image_name = '$image_name', description = '$description' WHERE food_id = '$id'";
            return $this->execute($sql);
        }


        public function delete($id, $tbl) {
            $sql = "DELETE FROM $tbl WHERE id = '$id'";
            return $this->execute($sql);
        }

        public function deleteChef($id) {
            $sql = "DELETE FROM chef WHERE chef_id = '$id'";
            return $this->execute($sql);
        }

        public function deleteFood($id) {
            $sql = "DELETE FROM food WHERE food_id = '$id'";
            return $this->execute($sql);
        }

        public function searchAdmin($tbl, $key) {
            $sql = "SELECT * FROM $tbl WHERE full_name REGEXP '$key' ORDER BY id";
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

        public function searchChef($tbl, $key) {
            $sql = "SELECT * FROM $tbl WHERE chef_name REGEXP '$key' ORDER BY chef_id";
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

        public function searchFood($tbl, $key) {
            $sql = "SELECT * FROM $tbl WHERE name REGEXP '$key' ORDER BY food_id";
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
    }
?>