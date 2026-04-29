<?php

class ClienteModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }


    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // CREATE
    public function create($nombre, $apellido) {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, apellido) VALUES (?, ?)");
        return $stmt->execute([$nombre, $apellido]);
    }


    public function update($id, $nombre, $apellido) {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre=?, apellido=? WHERE id=?");
        return $stmt->execute([$nombre, $apellido, $id]);
    }


    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id=?");
        return $stmt->execute([$id]);
    }
    
}