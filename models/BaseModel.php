<?php
    class BaseModel extends Database {
        protected $conn;
        protected $res;

        public function __construct()
        {
            $this->conn = $this->connect();
        }

        public function cntTblRow($tbl) {
            $sql = "SELECT COUNT(*) as total FROM $tbl";
            $query = $this->_query($sql);
            $row = mysqli_fetch_assoc($query);
            return $row['total'];
        }

        public function getAllData($tbl) {
            $sql = "SELECT * FROM $tbl";
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
        
        public function _query($sql) {
           return mysqli_query($this->conn, $sql);
        }

        public function cnt_rows(){
            if ($this->res) {
                $num = mysqli_num_rows($this->res);
            } else {
                $num = 0;
            }
            return $num;
        }
        
    }
?>