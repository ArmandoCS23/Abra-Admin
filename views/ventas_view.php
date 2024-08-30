<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ventas.css">
    <title>Ventas - El AbraExpress</title>
    <style>
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .close-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <!-- Botón para cerrar y regresar al dashboard -->
    <button class="close-button" onclick="window.location.href='index.php?controller=admin_dashboard'">X</button>

    <div class="main-content">
        <h1>Ventas</h1>
        <a href="index.php?controller=ventas&action=exportarCSV" class="btn-export">Exportar CSV</a>
        <table class="ventas-table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>ID Usuario</th>
                    <th>ID Producto</th>
                    <th>Cantidad</th>
                    <th>Método de Pago</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?php echo $venta['id']; ?></td>
                        <td><?php echo $venta['id_usuario']; ?></td>
                        <td><?php echo $venta['id_producto']; ?></td>
                        <td><?php echo $venta['cantidad']; ?></td>
                        <td><?php echo $venta['metodo_pago']; ?></td>
                        <td><?php echo $venta['fecha']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
