<?php
    require_once 'BaseModel.php';

    class AccountModel extends BaseModel {
        const TABLE = 'account';

        public function insertDataAccount($username, $password, $customer_id) {
            $sql = "INSERT INTO account(account_id, username, password, customer_id)
                    VALUES(null, '$username', '$password', $customer_id)";
            if ($this->_query($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }

        public function deleteAccount($id) {
            $sql = "DELETE FROM account WHERE account_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllAccounts() {
            $sql = "SELECT account.*, customer.customer_name FROM account LEFT JOIN customer ON account.customer_id = customer.customer_id";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
    
        public function countAccounts() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getAccountsFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE account_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateAccounts($id, $username, $password, $customer_id) {
            $sql = "UPDATE account SET username = '$username', password = '$password', customer_id = $customer_id WHERE account_id = $id";
            return $this->_query($sql);
        }

        public function searchForAccount($key)
        {
            $sql = "SELECT account.*, customer.customer_name FROM account LEFT JOIN customer ON account.customer_id = customer.customer_id
                    WHERE customer_name LIKE '%$key%'
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
