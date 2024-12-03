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
            $sql = "SELECT customer.*, waiter.waiter_name FROM customer LEFT JOIN waiter ON customer.waiter_id = waiter.waiter_id";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
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

        public function updateCustomer($id, $customer_name, $address, $waiter_id ,$phone, $email) {
            $sql = "UPDATE customer SET customer_name = '$customer_name', address = '$address', phone = '$phone', waiter_id = $waiter_id,  email = '$email' WHERE customer_id = $id";
            return $this->_query($sql);
        }

        public function searchForCustomer($key)
        {
            $sql = "SELECT customer.*, waiter.waiter_name FROM customer LEFT JOIN waiter ON customer.waiter_id = waiter.waiter_id
                    WHERE customer_name LIKE '%$key%'";
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
