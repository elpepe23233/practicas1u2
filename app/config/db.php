<?php

// ======================
// MYSQL PDO
// ======================
function conectarMySQL() {
    try {
        $pdo = new PDO("mysql:host=mysql;dbname=info;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDException $e) {
        die(" Error MySQL: " . $e->getMessage());
    }
}

// ======================
// POSTGRESQL PDO
// ======================
function conectarPostgres() {
    try {
        $pdo = new PDO("pgsql:host=postgres;dbname=testdb", "testuser", "123456");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die(" Error PostgreSQL: " . $e->getMessage());
    }
}