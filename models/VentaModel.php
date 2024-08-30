<?php
class VentaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getVentas() {
        $query = "SELECT * FROM ventas";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Uso de fetchAll con PDO::FETCH_ASSOC
    }
}
?>
