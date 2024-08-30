<?php
require_once 'models/VentaModel.php';

class VentasController {
    private $ventaModel;

    public function __construct() {
        $this->ventaModel = new VentaModel((new Database())->getConnection());
    }

    public function mostrarVentas() {
        $ventas = $this->ventaModel->getVentas();
        include 'views/ventas_view.php';
    }

    public function exportarCSV() {
        $ventas = $this->ventaModel->getVentas();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=ventas.csv');
        $output = fopen('php://output', 'w');

        // Encabezados CSV
        fputcsv($output, ['ID Venta', 'ID Usuario', 'ID Producto', 'Cantidad', 'Método de Pago', 'Fecha']);

        // Datos de las ventas
        foreach ($ventas as $venta) {
            fputcsv($output, $venta);
        }

        fclose($output);
        exit();
    }
}
?>