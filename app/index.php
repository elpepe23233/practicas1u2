<?php
require_once "config/db.php";

$mysql_ok = false;
$postgres_ok = false;

try {
    $mysql = conectarMySQL();
    $mysql_ok = true;
} catch (Exception $e) {}

try {
    $postgres = conectarPostgres();
    $postgres_ok = true;
} catch (Exception $e) {}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
}

.header {
    background: #343a40;
    color: white;
    padding: 20px;
    text-align: center;
}

.container {
    max-width: 900px;
    margin: 30px auto;
    padding: 20px;
}

.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.card {
    flex: 1;
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

.card a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.card a:hover {
    background: #0056b3;
}

.status {
    background: white;
    padding: 20px;
    border-radius: 10px;
}

.ok {
    color: green;
    font-weight: bold;
}

.error {
    color: red;
    font-weight: bold;
}
</style>

</head>

<body>

<div class="header">
    <h1>Sistema de Cobros</h1>
</div>

<div class="container">

    <div class="cards">
        <div class="card">
            <h2>Clientes</h2>
            <p>Gestión de clientes (MySQL)</p>
            <a href="views/clientes.php">Ir a Clientes</a>
        </div>

        <div class="card">
            <h2>Cobros</h2>
            <p>Gestión de cobros (PostgreSQL)</p>
            <a href="views/cobros.php">Ir a Cobros</a>
        </div>
    </div>

    <div class="status">
        <h3>Estado de Conexiones</h3>

        <p>
            MySQL:
            <span class="<?= $mysql_ok ? 'ok' : 'error' ?>">
                <?= $mysql_ok ? 'Conectado' : 'Error' ?>
            </span>
        </p>

        <p>
            PostgreSQL:
            <span class="<?= $postgres_ok ? 'ok' : 'error' ?>">
                <?= $postgres_ok ? 'Conectado' : 'Error' ?>
            </span>
        </p>
    </div>

</div>

</body>
</html>