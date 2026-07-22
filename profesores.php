<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
    exit();
}

require_once("config/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $correo=$_POST["correo"];
    $telefono=$_POST["telefono"];
    $materia=$_POST["materia"];

    $sql="INSERT INTO profesores(nombre,apellido_paterno,correo,telefono,materia)
          VALUES(?,?,?,?,?)";

    $stmt=$conexion->prepare($sql);
    $stmt->execute([$nombre,$apellido,$correo,$telefono,$materia]);
}

$profesores=$conexion->query("SELECT * FROM profesores ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Profesores</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Registro de Profesores</h2>

<form method="POST">

<input class="form-control mb-2" name="nombre" placeholder="Nombre" required>

<input class="form-control mb-2" name="apellido" placeholder="Apellido" required>

<input class="form-control mb-2" name="correo" placeholder="Correo" required>

<input class="form-control mb-2" name="telefono" placeholder="Teléfono">

<input class="form-control mb-2" name="materia" placeholder="Materia">

<button class="btn btn-primary">
Guardar
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Apellido</th>

<th>Correo</th>

<th>Teléfono</th>

<th>Materia</th>

</tr>

<?php foreach($profesores as $p){ ?>

<tr>

<td><?=$p["id"]?></td>

<td><?=$p["nombre"]?></td>

<td><?=$p["apellido_paterno"]?></td>

<td><?=$p["correo"]?></td>

<td><?=$p["telefono"]?></td>

<td><?=$p["materia"]?></td>

</tr>

<?php } ?>

</table>

</body>

</html>