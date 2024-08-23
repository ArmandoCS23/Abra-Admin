<?php

class ProductModel {
    private $conn;
    private $table_name = "productos";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllProducts() {
        $query = "SELECT id, nombre, descripcion, precio, imagen, stock FROM " . $this->table_name; // Añadido 'stock'
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($nombre, $descripcion, $precio, $stock, $imagen) { // Añadido 'stock'
        $query = "INSERT INTO " . $this->table_name . " (nombre, descripcion, precio, stock, imagen) VALUES (:nombre, :descripcion, :precio, :stock, :imagen)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock); // Añadido 'stock'
        $stmt->bindParam(':imagen', $imagen);

        return $stmt->execute();
    }

    public function updateProduct($id, $nombre, $descripcion, $precio, $stock, $imagen) { // Añadido 'stock'
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, imagen = :imagen WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock); // Añadido 'stock'
        $stmt->bindParam(':imagen', $imagen);

        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getProductById($id) {
        $query = "SELECT id, nombre, descripcion, precio, stock, imagen FROM " . $this->table_name . " WHERE id = :id"; // Añadido 'stock'
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>