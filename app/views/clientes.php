<?php
require "../config/db.php";
require __DIR__ . "/../models/clienteModelo.php";
$pdo = conectarMySQL();
$model = new ClienteModel($pdo);

// DELETE
if (isset($_GET['delete'])) {
    $model->delete($_GET['delete']);
    header("Location: clientes.php");
    exit;
}

// CREATE
if ($_POST) {

    if (!empty($_POST['id'])) {
        // EDITAR
        $model->update($_POST['id'], $_POST['nombre'], $_POST['apellido']);
    } else {
        // CREAR
        $model->create($_POST['nombre'], $_POST['apellido']);
    }

    header("Location: clientes.php");
    exit;
}
// READ
$clientes = $model->getAll();
$clienteEdit = null;

if (isset($_GET['edit'])) {
    foreach ($clientes as $c) {
        if ($c['id'] == $_GET['edit']) {
            $clienteEdit = $c;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Clientes</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
}

h1 {
    text-align: center;
}

form {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

input {
    padding: 8px;
    flex: 1;
}

button {
    padding: 8px 15px;
    background: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

a.delete {
    color: red;
    text-decoration: none;
    font-weight: bold;
}

a.delete:hover {
    text-decoration: underline;
}
</style>

</head>

<body>

<div class="container">

<h1>Gestión de Clientes</h1>

<form method="POST">

  <input type="hidden" name="id" value="<?= $clienteEdit['id'] ?? '' ?>">

  <input name="nombre"
         placeholder="Nombre"
         required
         value="<?= $clienteEdit['nombre'] ?? '' ?>">

  <input name="apellido"
         placeholder="Apellido"
         required
         value="<?= $clienteEdit['apellido'] ?? '' ?>">

  <button type="submit">
    <?= isset($clienteEdit) ? "Actualizar" : "Guardar" ?>
  </button>

</form>

<table>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Acciones</th>
</tr>

<?php foreach ($clientes as $c): ?>
<tr>
  <td><?= $c['id'] ?></td>
  <td><?= $c['nombre'] ?></td>
  <td><?= $c['apellido'] ?></td>
  <td>
    <a class="delete" href="?delete=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar cliente?')">
        Eliminar
    </a>

      
  <a href="?edit=<?= $c['id'] ?>">
    Editar
  </a>
</td>
  </td>
</tr>
<?php endforeach; ?>

</table>

</div>

</body>
</html>