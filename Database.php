<?php
class Database {
    private $host = "localhost";
    private $db_name = "el_abra_express"; // Cambiado a la base de datos de usuarios
    private $username = "root"; // Cambiar si es necesario
    private $password = ""; // Cambiar si es necesario
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>