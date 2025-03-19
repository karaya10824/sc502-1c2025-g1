<?php
class GastoModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'GaMan25.', 'mvc_login_db');
    }

    public function getAllGastos() {
        $result = $this->db->query("SELECT * FROM Gastos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGastoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Gastos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addGasto($codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("INSERT INTO Gastos (codigo, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssdi', $codigo, $nombre, $precio, $cantidad);
        $stmt->execute();
    }

    public function updateGasto($id, $codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("UPDATE Gastos SET codigo = ?, nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('ssdii', $codigo, $nombre, $precio, $cantidad, $id);
        $stmt->execute();
    }

    public function deleteGasto($id) {
        $stmt = $this->db->prepare("DELETE FROM Gastos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>