<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_users.css">
    <title>Usuarios Registrados</title>
    <style>
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            text-decoration: none;
            color: #000;
        }
        .close-btn:hover {
            color: #f00;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <a href="index.php?controller=admin_dashboard" class="close-btn">&times;</a>
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nombre']; ?></td>
                    <td><?php echo $user['apellidos']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['telefono']; ?></td>
                    <td>
                        <button onclick="editUser(<?php echo $user['id']; ?>)">Editar</button>
                        <button onclick="deleteUser(<?php echo $user['id']; ?>)">Borrar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function editUser(id) {
            window.location.href = 'index.php?controller=admin_users&action=edit_form&id=' + id;
        }

        function deleteUser(id) {
            if (confirm('¿Estás seguro de que quieres borrar este usuario?')) {
                window.location.href = 'index.php?controller=admin_users&action=delete&id=' + id;
            }
        }
    </script>
</body>
</html>
