<?php
class AdminDashboardController {
    public function index() {
        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['admin_username'])) {
            header("Location: index.php?controller=admin_login");
            exit();
        }

        $adminUsername = $_SESSION['admin_username'];
        include 'views/admin_dashboard.php';
    }
}
?>
