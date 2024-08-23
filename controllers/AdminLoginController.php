<?php
class AdminLoginController {
    public function index() {
        include 'views/admin_login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $adminModel = new AdminUserModel();
            if ($adminModel->login($username, $password)) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header('Location: index.php?controller=admin_dashboard');
                exit();
            } else {
                $error = "Nombre de usuario o contraseña incorrectos";
                include 'views/admin_login.php';
            }
        } else {
            include 'views/admin_login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=admin_login');
        exit();
    }
}
