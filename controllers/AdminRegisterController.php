<?php
require_once 'models/AdminUserModel.php';

class AdminRegisterController {
    private $adminUserModel;

    public function __construct() {
        $this->adminUserModel = new AdminUserModel();
    }

    public function index() {
        include 'views/admin_register.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                $error = "Las contraseñas no coinciden.";
                include 'views/admin_register.php';
                return;
            }

            $registrationSuccessful = $this->adminUserModel->register($nombre, $apellidos, $email, $username, $password);

            if ($registrationSuccessful) {
                header("Location: index.php?controller=admin_login&success=true");
                exit();
            } else {
                $error = "Error al registrar el administrador.";
                include 'views/admin_register.php';
            }
        } else {
            include 'views/admin_register.php';
        }
    }
}
?>
