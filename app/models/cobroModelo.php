<?php

class CobroModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

   
    public function getAll() {
        return $this->db->query("SELECT * FROM cobros")->fetchAll(PDO::FETCH_ASSOC);
    }

        public function create($cliente, $monto, $estado) {
        $stmt = $this->db->prepare("INSERT INTO cobros (cliente, monto, estado) VALUES (?, ?, ?)");
        return $stmt->execute([$cliente , $monto, $estado]);
    }


    public function update($id, $cliente, $monto, $estado) {
        $stmt = $this->db->prepare("UPDATE cobros SET cliente=?, monto=?, estado=? WHERE id=?");
        return $stmt->execute([$cliente, $monto, $estado, $id]);
    }


    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cobros WHERE id=?");
        return $stmt->execute([$id]);
    }
}