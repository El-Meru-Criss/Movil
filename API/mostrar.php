<?php

require_once "cors.php";
require_once "./modelo/conexion.php";


$stmt = $pdo -> query("SELECT id, nombre, Apellido, Telefono, Correo, Usuario, Contraseña FROM usuarios");
$datos = $stmt -> fetchAll();

$json = json_encode($datos);

header('Content-type: application/json');

echo $json;

?>