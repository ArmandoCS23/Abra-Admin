<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Registro de Administrador</title>
</head>
<body>
    <div class="admin-form-container">
        <h2>Registro de Administrador</h2>
        <form action="index.php?controller=admin_register&action=register" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Nombre de Usuario" required>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <div class="password-container">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required>
            </div>
            <div>
                <input type="checkbox" id="show-password" onclick="togglePassword()">
                <label for="show-password">Mostrar contraseñas</label>
            </div>
            <button type="submit">Registrar</button>
        </form>
        <p>¿Ya tienes una cuenta de administrador? <a href="index.php?controller=admin_login">Inicia sesión aquí</a></p>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const showPasswordCheckbox = document.getElementById('show-password');
            
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
