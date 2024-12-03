<?php
    require_once 'BaseModel.php';

    class SupplierModel extends BaseModel {
        const TABLE = 'supplier';

        public function insertDataSupplier($supplier_city, $supplier_name, $phone) {
            $sql = "INSERT INTO supplier(supplier_id, supplier_city, supplier_name, phone, chef_id)
                    VALUES(null, '$supplier_city', '$supplier_name', '$phone', null)";
            if ($this->_query($sql)) {
                return mysqli_insert_id($this->conn);
            } else {
                return false;
            }
        }

        public function deleteSupplier($id) {
            $sql = "DELETE FROM supplier WHERE supplier_id = '$id'";
            return $this->_query($sql);
        }
    
        public function getAllSuppliers() {
            $sql = "SELECT supplier.*, chef.chef_name FROM supplier LEFT JOIN chef ON supplier.chef_id = chef.chef_id";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
    
        public function countSuppliers() {
            return $this->cntTblRow(self::TABLE);
        }

        public function getSuppliersFromID($id) {
            $sql = "SELECT * FROM " . self::TABLE . " WHERE supplier_id = $id";
            $result = $this->_query($sql);
            if ($result) {
                return mysqli_fetch_assoc($result);
            }
            return null; 
        }

        public function updateSuppliers($id, $supplier_city, $supplier_name, $phone, $chef_id) {
            $sql = "UPDATE supplier SET supplier_city = '$supplier_city', supplier_name = '$supplier_name', phone = '$phone', chef_id = $chef_id WHERE supplier_id = $id";
            return $this->_query($sql);
        }

        public function searchForSupplier($key)
        {
            $sql = "SELECT * FROM supplier LEFT JOIN chef ON supplier.chef_id = chef.chef_id
                    WHERE supplier_name LIKE '%$key%'";
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
