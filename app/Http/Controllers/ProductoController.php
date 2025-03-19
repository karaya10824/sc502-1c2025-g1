<?php
require_once 'models/ProductoModel.php';

class ProductoController {

    public function listarProductos() {
        $ProductoModel = new ProductoModel();
        $Productos = $ProductoModel->getAllProductos();
        require_once 'views/dashboardInventario.php';
    }

    public function agregarProducto() {
        require_once '/dashboardInventario.php';
    }

    public function guardarProducto() {
        if (isset($_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad'])) {
            $ProductoModel = new ProductoModel();
            $ProductoModel->addProducto($_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad']);
            header('Location: index.php?action=listarProductos');
        } else {
            require_once 'views/Productos/add.php';
        }
    }

    public function editarProducto($id) {
        $ProductoModel = new ProductoModel();
        $Producto = $ProductoModel->getProductoById($id);
        require_once 'views/Productos/edit.php';
    }

    public function actualizarProducto() {
        if (isset($_POST['id'], $_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad'])) {
            $ProductoModel = new ProductoModel();
            $ProductoModel->updateProducto($_POST['id'], $_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad']);
            header('Location: index.php?action=listarProductos');
        }
    }

    public function eliminarProducto($id) {
        $ProductoModel = new ProductoModel();
        $ProductoModel->deleteProducto($id);
        header('Location: index.php?action=listarProductos');
    }
}
?>
