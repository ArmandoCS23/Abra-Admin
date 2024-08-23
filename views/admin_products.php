<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_products.css">
    <title>Productos - El AbraExpress</title>
    <script>
        function confirmDelete(productId) {
            if (confirm('¿Estás seguro de que deseas borrar este producto?')) {
                window.location.href = 'index.php?controller=admin_products&action=delete&id=' + productId;
            }
        }
    </script>
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
        <h1>Productos</h1>
        <a href="index.php?controller=admin_products&action=create" class="btn">Añadir Producto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th> <!-- Nueva columna para Stock -->
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['nombre']; ?></td>
                        <td><?php echo $product['descripcion']; ?></td>
                        <td><?php echo $product['precio']; ?></td>
                        <td><?php echo $product['stock']; ?></td> <!-- Mostrar el Stock -->
                        <td><img src="images/products/<?php echo $product['imagen']; ?>" alt="<?php echo $product['nombre']; ?>" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a href="index.php?controller=admin_products&action=edit&id=<?php echo $product['id']; ?>" class="btn">Editar</a>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $product['id']; ?>);" class="btn">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
