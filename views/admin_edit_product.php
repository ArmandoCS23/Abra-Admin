<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="styles/admin_edit_product.css">
    <style>
        .button-group {
            display: flex;
            gap: 10px;
        }
        .button-group button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-group .cancel-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="index.php?controller=admin_products&action=edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $product['nombre']; ?>" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $product['descripcion']; ?></textarea>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $product['precio']; ?>" required>
        </div>
        <div>
            <label for="stock">Stock:</label> <!-- Campo de entrada para Stock -->
            <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" min="0" required>
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
            <img src="images/products/<?php echo $product['imagen']; ?>" alt="Imagen actual" style="width:100px;">
        </div>
        <div class="button-group">
            <button type="submit">Actualizar Producto</button>
            <button type="button" class="cancel-btn" onclick="window.location.href='index.php?controller=admin_products'">Cancelar</button>
        </div>
    </form>
</body>
</html>
