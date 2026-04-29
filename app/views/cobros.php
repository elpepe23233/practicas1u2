<?php

require "../config/db.php";
require __DIR__ . "/../models/cobroModelo.php";

$pdo = conectarPostgres();
$model = new CobroModel($pdo);

// DELETE
if (isset($_GET['delete'])) {
    $model->delete($_GET['delete']);
    header("Location: cobros.php");
    exit;
}


//post 
if ($_POST) {

    if (!empty($_POST['id'])) {
        // UPDATE
        $model->update($_POST['id'], $_POST['cliente'], $_POST['monto'], $_POST['estado']);
    } else {
        // CREATE
        $model->create($_POST['cliente'], $_POST['monto'], $_POST['estado']);
    }

    header("Location: cobros.php");
    exit;
}


// CREATE
if ($_POST) {
    $model->create($_POST['cliente'], $_POST['monto'], $_POST['estado']);
}

// READ
$cobros = $model->getAll();

$cobroEdit = null;

if (isset($_GET['edit'])) {
    foreach ($cobros as $c) {
        if ($c['id'] == $_GET['edit']) {
            $cobroEdit = $c;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cobros</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 900px;
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
    background: #28a745;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background: #218838;
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
    background: #28a745;
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

<h1>Gestión de Cobros</h1>

<form method="POST">

  <input type="hidden" name="id" value="<?= $cobroEdit['id'] ?? '' ?>">

  <input name="cliente"
         placeholder="Cliente"
         required
         value="<?= $cobroEdit['cliente'] ?? '' ?>">

  <input name="monto"
         placeholder="Monto"
         required
         value="<?= $cobroEdit['monto'] ?? '' ?>">

  <input name="estado"
         placeholder="Estado"
         required
         value="<?= $cobroEdit['estado'] ?? '' ?>">

  <button type="submit">
    <?= isset($cobroEdit) ? "Actualizar" : "Guardar" ?>
  </button>

</form>

<table>
<tr>
  <th>ID</th>
  <th>Cliente</th>
  <th>Monto</th>
  <th>Estado</th>
  <th>Acciones</th>
</tr>

<?php foreach ($cobros as $c): ?>
<tr>
  <td><?= $c['id'] ?></td>
  <td><?= $c['cliente'] ?></td>
  <td><?= $c['monto'] ?></td>
  <td><?= $c['estado'] ?></td>
  <td>
       <a href="?edit=<?= $c['id'] ?>">Editar</a>
    <a href="?delete=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar cobro?')">Eliminar</a>
    </a>
  </td>
</tr>
<?php endforeach; ?>

</table>

</div>

</body>
</html>