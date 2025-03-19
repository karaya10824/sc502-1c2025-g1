<?php
class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'GaMan25.', 'mvc_login_db');
    }

    public function getAllCategorias() {
        $result = $this->db->query("SELECT * FROM Categorias");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoriaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Categorias WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addCategoria($codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("INSERT INTO Categorias (codigo, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssdi', $codigo, $nombre, $precio, $cantidad);
        $stmt->execute();
    }

    public function updateCategoria($id, $codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("UPDATE Categorias SET codigo = ?, nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('ssdii', $codigo, $nombre, $precio, $cantidad, $id);
        $stmt->execute();
    }

    public function deleteCategoria($id) {
        $stmt = $this->db->prepare("DELETE FROM Categorias WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>