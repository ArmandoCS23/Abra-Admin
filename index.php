<?php
session_start();

require_once 'controllers/AdminLoginController.php';
require_once 'controllers/AdminRegisterController.php';
require_once 'controllers/AdminDashboardController.php';
require_once 'controllers/AdminUsersController.php';
require_once 'controllers/AdminProductsController.php';
require_once 'controllers/VentasController.php';  // Añadimos el controlador de ventas

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'admin_login';

switch ($controllerName) {
    case 'admin_login':
        $controller = new AdminLoginController();
        if (isset($_GET['action']) && $_GET['action'] === 'logout') {
            $controller->logout();
        } else {
            $controller->login();
        }
        break;
    case 'admin_dashboard':
        $controller = new AdminDashboardController();
        $controller->index();
        break;
    case 'admin_register':
        $controller = new AdminRegisterController();
        $controller->register();
        break;
    case 'admin_users':
        $controller = new AdminUsersController();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'edit_form':
                    $controller->edit_form();
                    break;
                case 'update':
                    $controller->update();
                    break;
                case 'delete':
                    $controller->delete();
                    break;
                default:
                    $controller->index();
                    break;
            }
        } else {
            $controller->index();
        }
        break;
    case 'admin_products':
        $controller = new AdminProductsController();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'create':
                    $controller->create();
                    break;
                case 'edit':
                    $controller->edit();
                    break;
                case 'delete':
                    $controller->delete();
                    break;
                default:
                    $controller->index();
                    break;
            }
        } else {
            $controller->index();
        }
        break;
    case 'ventas':  // Nueva ruta para la sección de ventas
        $controller = new VentasController();
        if (isset($_GET['action']) && $_GET['action'] === 'exportarCSV') {
            $controller->exportarCSV();
        } else {
            $controller->mostrarVentas();
        }
        break;
    default:
        $controller = new AdminLoginController();
        $controller->login();
        break;
}
?>
