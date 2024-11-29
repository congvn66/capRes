<?php
    require_once 'BaseModel.php';

    class CustomerModel extends BaseModel {
        const TABLE = 'customer';

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

        public function deleteCustomer($id) {
            $sql = "DELETE FROM customer WHERE customer_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllCustomers() {
            return $this->getAllData(self::TABLE);
        }
    
        public function countCustomers() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getCustomerFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE customer_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateCustomer($id, $customer_name, $address, $phone, $email) {
            $sql = "UPDATE customer SET customer_name = '$customer_name', address = '$address', chef_id = $chefId, image_name = '$image_name', description = '$description' WHERE food_id = '$id'";
            return $this->_query($sql);
        }

        public function searchForFood($key)
        {
            $sql = "SELECT * FROM " . self::TABLE . " 
                    WHERE name LIKE '%$key%'
                    OR description LIKE '%$key%'";
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
