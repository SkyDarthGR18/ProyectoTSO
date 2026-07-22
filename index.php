<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    if($usuario=="admin" && $password=="admin123"){

        $_SESSION['usuario']=$usuario;

        header("Location: dashboard.php");
        exit();

    }else{

        $error="Usuario o contraseña incorrectos.";

    }

}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema de Profesores</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h3>Centro de Cómputo</h3>

<p>Sistema de Registro de Profesores</p>

</div>

<div class="card-body">

<?php

if(isset($error)){

echo "<div class='alert alert-danger'>$error</div>";

}

?>

<form method="POST">

<label>Usuario</label>

<input
type="text"
name="usuario"
class="form-control"
required>

<br>

<label>Contraseña</label>

<input
type="password"
name="password"
class="form-control"
required>

<br>

<button
class="btn btn-primary w-100">

Iniciar sesión

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>