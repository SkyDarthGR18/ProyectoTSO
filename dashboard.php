<?php

session_start();

if(!isset($_SESSION['usuario'])){

header("Location:index.php");

exit();

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

Sistema de Profesores

</span>

<a
href="logout.php"
class="btn btn-danger">

Cerrar sesión

</a>

</div>

</nav>

<div class="container mt-5">

<h2>

Bienvenido

<?=$_SESSION['usuario'];?>

</h2>

<hr>

<a
href="profesores.php"
class="btn btn-success">

Administrar Profesores

</a>

</div>

</body>

</html>