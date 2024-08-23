<?php

require_once 'models/ProductModel.php';

class AdminProductsController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require_once 'views/admin_products.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock']; // Obtener el valor de stock del formulario
            $imagen = $_FILES['imagen']['name'];

            // Guardar la imagen en la carpeta 'images/products'
            $target_dir = "images/products/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

            // Crear el producto con el campo de stock
            $this->productModel->createProduct($nombre, $descripcion, $precio, $stock, $imagen);
            header('Location: index.php?controller=admin_products');
        } else {
            require_once 'views/admin_create_product.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock']; // Obtener el valor de stock del formulario
            $imagen = $_FILES['imagen']['name'];

            // Guardar la imagen en la carpeta 'images/products'
            $target_dir = "images/products/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

            // Actualizar el producto con el campo de stock
            $this->productModel->updateProduct($id, $nombre, $descripcion, $precio, $stock, $imagen);
            header('Location: index.php?controller=admin_products');
        } else {
            $id = $_GET['id'];
            $product = $this->productModel->getProductById($id);
            require_once 'views/admin_edit_product.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->productModel->deleteProduct($id);
        header('Location: index.php?controller=admin_products');
    }
}
?>