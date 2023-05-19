<?php

require_once "cors.php";

$host = 'localhost';
$dbname = 'datos';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
}
catch (PDOException $e) {
    die("Error: No se pudo conectar. " . $e->getMessage());
}

$nombre = 'criss';
$apellido = 'gonzalez';
$telefono = '3';
$correo = 'criss@gmail.com';
$usuario = 'criss';
$contrasena = '1234';

$stmt = $pdo -> query("INSERT INTO usuarios VALUES 
(NULL,
'".$nombre."'
,'".$apellido."'
,'".$telefono."'
,'".$correo."'
,'".$usuario."'
,'".$contrasena."'
,NULL)");
$datos = $stmt -> fetchAll();

$json = json_encode($datos);

header('Content-type: application/json');

echo $json;

?>