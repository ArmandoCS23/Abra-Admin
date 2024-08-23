<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_edit_user.css">
    <title>Editar Usuario</title>
</head>
<body>
    <div class="main-content">
        <h2>Editar Usuario</h2>
        <form action="index.php?controller=admin_users&action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre']; ?>" required>
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $user['apellidos']; ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $user['telefono']; ?>" required>
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
