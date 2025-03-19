<?php
class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'Ar4y4.24', 'caselabDB');
    }

    public function getAllProductos() {
        $result = $this->db->query("SELECT * FROM productos;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Productos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addProducto($codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("INSERT INTO Productos (codigo, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssdi', $codigo, $nombre, $precio, $cantidad);
        $stmt->execute();
    }

    public function updateProducto($id, $codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("UPDATE Productos SET codigo = ?, nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('ssdii', $codigo, $nombre, $precio, $cantidad, $id);
        $stmt->execute();
    }

    public function deleteProducto($id) {
        $stmt = $this->db->prepare("DELETE FROM Productos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>