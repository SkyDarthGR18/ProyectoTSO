<?php

$host = "localhost";
$port = "5432";
$dbname = "proyecto_tso";
$user = "proyecto_tso";
$password = "shin0106";

try {

    $conexion = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error de conexión: " . $e->getMessage());

}