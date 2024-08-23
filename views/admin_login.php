<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Inicio de Sesión de Administrador</title>
</head>
<body>
    <div class="admin-form-container">
        <h2>Inicio de Sesión de Administrador</h2>
        <form action="index.php?controller=admin_login&action=login" method="POST">
            <input type="text" name="username" placeholder="Nombre de Usuario" required>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <div>
                <input type="checkbox" id="show-password" onclick="togglePassword()">
                <label for="show-password">Mostrar contraseña</label>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta de administrador? <a href="index.php?controller=admin_register">Regístrate aquí</a></p>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const showPasswordCheckbox = document.getElementById('show-password');
            
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
