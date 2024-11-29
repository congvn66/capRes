<?php
require_once 'Database.php';

class ChefModel extends Database {
    public function getAllChefs() {
        $sql = "SELECT * FROM chef";
        $result = $this->execute($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insertChef($chef_name, $salary, $image_name) {
        $stmt = $this->prepare("INSERT INTO chef (chef_id, chef_name, salary, image_name) VALUES (NULL, ?, ?, ?)");
        $stmt->bind_param("sds", $chef_name, $salary, $image_name);
        return $stmt->execute();
    }

    public function updateChef($id, $chef_name, $salary, $image_name) {
        $sql = "UPDATE chef SET chef_name = '$chef_name', salary = $salary, image_name = '$image_name' WHERE chef_id = $id";
        return $this->execute($sql);
    }

    public function deleteChef($id) {
        $sql = "DELETE FROM chef WHERE chef_id = $id";
        return $this->execute($sql);
    }
}
?>
