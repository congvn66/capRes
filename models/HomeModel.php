<?php
    require_once 'Database.php';

    class HomeModel extends Database {
        public function cntTblRow($tbl) {
            $sql = "SELECT COUNT(*) as total FROM $tbl";
            $result = $this->execute($sql);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    }
?>
