<?php
require_once 'Database.php';

class AdminUserModel {
    private $conn;
    private $table_name = "admin_users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($username, $password) {
        $query = "SELECT id, password FROM " . $this->table_name . " WHERE username = :username";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                return true;
            }
        }
        return false;
    }

    public function register($nombre, $apellidos, $email, $username, $password) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellidos, email, username, password) 
                  VALUES (:nombre, :apellidos, :email, :username, :password)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

        return $stmt->execute();
    }
}
?>