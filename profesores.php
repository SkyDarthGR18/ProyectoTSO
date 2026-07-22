<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
    exit();
}

require_once("config/database.php");

if(isset($_POST["guardar"])){

    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $correo=$_POST["correo"];
    $telefono=$_POST["telefono"];
    $materia=$_POST["materia"];

    $sql=$conexion->prepare("
    INSERT INTO profesores
    (nombre,apellido_paterno,correo,telefono,materia)
    VALUES
    (?,?,?,?,?)");

    $sql->execute([
        $nombre,
        $apellido,
        $correo,
        $telefono,
        $materia
    ]);

}

$consulta=$conexion->query("
SELECT * FROM profesores
ORDER BY id DESC
");

?>

<!DOCTYPE html>

<html>

<head>

<title>Profesores</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-4">

<h2>

Registro de Profesores

</h2>

<form method="POST">

<input
name="nombre"
class="form-control mb-2"
placeholder="Nombre"
required>

<input
name="apellido"
class="form-control mb-2"
placeholder="Apellido"
required>

<input
type="email"
name="correo"
class="form-control mb-2"
placeholder="Correo"
required>

<input
name="telefono"
class="form-control mb-2"
placeholder="Teléfono">

<input
name="materia"
class="form-control mb-2"
placeholder="Materia">

<button
name="guardar"
class="btn btn-primary">

Guardar Profesor

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

<?php

while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){

?>

<tr>

<td><?=$fila["id"]?></td>

<td><?=$fila["nombre"]?></td>

<td><?=$fila["apellido_paterno"]?></td>

<td><?=$fila["correo"]?></td>

<td><?=$fila["telefono"]?></td>

<td><?=$fila["materia"]?></td>

</tr>

<?php } ?>

</table>

<a
href="dashboard.php"
class="btn btn-secondary">

Regresar

</a>

</body>

</html>