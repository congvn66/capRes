<?php
    class Database {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db_name = 'capy-restaurant';

        private $conn;

        public function connect() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            if ($this->conn->connect_error) {
                die("Failed to connect to database: " . $this->conn->connect_error);
            }

            mysqli_set_charset($this->conn, 'utf8');
            return $this->conn;
        }
    }
?>
