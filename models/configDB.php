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

        public function getAllDataForFrontChef($tbl) {
            $sql = "SELECT * FROM $tbl ORDER BY salary DESC LIMIT 3";
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

        public function getAllDataForFrontFood($tbl) {
            $sql = "SELECT * FROM $tbl LIMIT 6";
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
        
        public function getAllDataForFrontCF($id) {
   
            $sql = "SELECT chef_name FROM chef WHERE chef_id = ?";
            
      
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                die("Statement preparation failed: " . $this->conn->error);
            }
            
        
            $stmt->bind_param("i", $id); 
            
      
            $stmt->execute();
            
    
            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                return 0;
            } else {
                $row = $result->fetch_assoc();
                return $row['chef_name'];
            }
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
            $full_name = mysqli_real_escape_string($this->conn, $full_name);
            $username = mysqli_real_escape_string($this->conn, $username);
            $password = mysqli_real_escape_string($this->conn, $password);
        
            $sql = "INSERT INTO admin(id, full_name, username, password)
                    VALUES(null, '$full_name', '$username', '$password')";
            return $this->execute($sql);
        }

        public function insertDataOrder($food_id, $qty, $order_date, $status, $customer_id) {
            $sql = "INSERT INTO orders(id, food_id, qty, order_date, status, customer_id)
                    VALUES(null, $food_id, $qty, '$order_date', '$status', $customer_id)";
            if ($this->execute($sql)){
                return true;
            } else {
                return false;
            }
        }

        public function insertDataCustomer($customer_name, $address, $phone, $email) {
            $customer_name = mysqli_real_escape_string($this->conn, $customer_name);
            $address = mysqli_real_escape_string($this->conn, $address);
            //$password = mysqli_real_escape_string($this->conn, $password);
        
            $sql = "INSERT INTO customer(customer_id, customer_name, address, phone, waiter_id, email)
                    VALUES(null, '$customer_name', '$address', $phone, null, '$email')";
            if ($this->execute($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }
        

        public function insertDataChef($chef_name, $salary, $image_name) {
            $stmt = $this->conn->prepare(
                "INSERT INTO chef(chef_id, chef_name, salary, image_name)
                VALUES (null, ?, ?, ?)"
            );
            $stmt->bind_param("sds", $chef_name, $salary, $image_name);
            return $stmt->execute();
        }
        

        public function insertDataFood($food_name, $price, $chef_id, $image_name, $description) {
            $food_name = mysqli_real_escape_string($this->conn, $food_name);
            $image_name = mysqli_real_escape_string($this->conn, $image_name);
            $description = mysqli_real_escape_string($this->conn, $description);
        
            $sql = "INSERT INTO food(food_id, name, price, chef_id, image_name, description)
                    VALUES(null, '$food_name', $price, '$chef_id', '$image_name', '$description')";
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
        public function updateDataOrder($qty, $status, $id){
            $sql = "UPDATE orders SET qty = $qty, status = '$status' WHERE id = $id";
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
            $sql = "SELECT * FROM $tbl WHERE name REGEXP '$key' OR description REGEXP '$key' ORDER BY food_id";
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

        public function searchCustomerOrders($tbl, $id) {
            $sql = "SELECT * FROM $tbl WHERE customer_id = $id ORDER BY order_date DESC";
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

        public function searchFoodByChef($chefId) {
            $sql = "SELECT * FROM food WHERE chef_id = $chefId ORDER BY food_id";
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

        public function searchCustomerByPhone($phone) {
            $sql = "SELECT * FROM customer WHERE phone = $phone";
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

        public function cntTblRow($tbl) {
            $sql = "SELECT * FROM $tbl";
            $this->execute($sql);
            return $this->cnt_rows();
        }
    }
?>