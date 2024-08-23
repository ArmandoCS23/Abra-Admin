<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_create_product.css">
    <title>Añadir Producto - El AbraExpress</title>
</head>

<body>
    <div class="container">
        <!-- X button for closing -->
        <div class="close-button">
            <a href="index.php?controller=admin_products">✖</a>
        </div>
        <h1>Añadir Producto</h1>
        <form action="index.php?controller=admin_products&action=create" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" required>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>

            <button type="submit">Añadir Producto</button>
        </form>
    </div>
</body>

</html>
