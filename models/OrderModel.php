<?php
    require_once 'BaseModel.php';

    class OrderModel extends BaseModel {
        const TABLE = 'orders';

        public function insertDataCustomer($customer_name, $address, $phone, $email) {
            $customer_name = mysqli_real_escape_string($this->conn, $customer_name);
            $address = mysqli_real_escape_string($this->conn, $address);
            //$password = mysqli_real_escape_string($this->conn, $password);
        
            $sql = "INSERT INTO customer(customer_id, customer_name, address, phone, waiter_id, email)
                    VALUES(null, '$customer_name', '$address', $phone, null, '$email')";
            if ($this->_query($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }

        public function deleteOrder($id) {
            $sql = "DELETE FROM " . self::TABLE . " WHERE id = $id";
            return $this->_query($sql);
        }
    
        public function getAllOrders() {
            $sql = "SELECT orders.*, customer.customer_name FROM orders JOIN customer ON customer.customer_id = orders.customer_id;";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
    
        public function countOrders() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getOrderFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateDataOrder($qty, $status, $id){
            $sql = "UPDATE orders SET qty = $qty, status = '$status' WHERE id = $id";
            return $this->_query($sql);
        }

        public function searchOrders($key) {
            $sql = "SELECT orders.*, customer.customer_name FROM orders JOIN customer ON customer.customer_id = orders.customer_id WHERE customer.customer_name LIKE '%$key%';";
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
