<?php
require_once 'Database.php';

class AdminModel extends Database {
    public function insertAdmin($full_name, $username, $password) {
        $stmt = $this->prepare("INSERT INTO admin (full_name, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $full_name, $username, $password);
        return $stmt->execute();
    }

    public function updateAdmin($id, $full_name, $username, $password) {
        $stmt = $this->prepare("UPDATE admin SET full_name = ?, username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $full_name, $username, $password, $id);
        return $stmt->execute();
    }

    public function deleteAdmin($id) {
        $stmt = $this->prepare("DELETE FROM admin WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public function searchAdmin($key) {
        $stmt = $this->prepare("SELECT * FROM admin WHERE full_name LIKE ? ORDER BY id");
        $key = "%$key%";
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
