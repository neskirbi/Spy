<?php
$con = mysqli_connect("localhost", "id9067304_espiando", "ramira1983", "id9067304_espiando");

if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



?>