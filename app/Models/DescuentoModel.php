<?php
class DescuentoModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'GaMan25.', 'mvc_login_db');
    }

    public function getAllDescuentos() {
        $result = $this->db->query("SELECT * FROM Descuentos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDescuentoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Descuentos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addDescuento($codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("INSERT INTO Descuentos (codigo, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssdi', $codigo, $nombre, $precio, $cantidad);
        $stmt->execute();
    }

    public function updateDescuento($id, $codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("UPDATE Descuentos SET codigo = ?, nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('ssdii', $codigo, $nombre, $precio, $cantidad, $id);
        $stmt->execute();
    }

    public function deleteDescuento($id) {
        $stmt = $this->db->prepare("DELETE FROM Descuentos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>