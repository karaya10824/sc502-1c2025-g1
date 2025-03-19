<?php
class EnvioModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'GaMan25.', 'mvc_login_db');
    }

    public function getAllEnvios() {
        $result = $this->db->query("SELECT * FROM Envios");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEnvioById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Envios WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addEnvio($codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("INSERT INTO Envios (codigo, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssdi', $codigo, $nombre, $precio, $cantidad);
        $stmt->execute();
    }

    public function updateEnvio($id, $codigo, $nombre, $precio, $cantidad) {
        $stmt = $this->db->prepare("UPDATE Envios SET codigo = ?, nombre = ?, precio = ?, cantidad = ? WHERE id = ?");
        $stmt->bind_param('ssdii', $codigo, $nombre, $precio, $cantidad, $id);
        $stmt->execute();
    }

    public function deleteEnvio($id) {
        $stmt = $this->db->prepare("DELETE FROM Envios WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>