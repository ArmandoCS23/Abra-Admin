<?php

class UserModel {
    private $conn;
    private $table_name = "usuarios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllUsers() {
        $query = "SELECT id, nombre, apellidos, email, telefono FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT id, nombre, apellidos, email, telefono FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $nombre, $apellidos, $email, $telefono) {
        $query = "UPDATE " . $this->table_name . " SET nombre = ?, apellidos = ?, email = ?, telefono = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nombre, $apellidos, $email, $telefono, $id]);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }
}
?>
