<?php
require_once 'models/UserModel.php';

class AdminUsersController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once 'views/admin_users.php';
    }

    public function edit() {
        $id = $_GET['id'];
        // Aquí puedes implementar la lógica para editar el usuario
        // Por ahora, solo redireccionamos a una página de edición (que debes crear)
        header("Location: index.php?controller=admin_users&action=edit_form&id=$id");
    }

    public function edit_form() {
        $id = $_GET['id'];
        $user = $this->userModel->getUserById($id);
        require_once 'views/admin_edit_user.php';
    }

    public function update() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $this->userModel->updateUser($id, $nombre, $apellidos, $email, $telefono);
        header("Location: index.php?controller=admin_users");
    }

    public function delete() {
        $id = $_GET['id'];
        $this->userModel->deleteUser($id);
        header("Location: index.php?controller=admin_users");
    }
}
?>
