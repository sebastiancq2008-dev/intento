<?php

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

echo "<h2>Datos recibidos</h2>";
echo "Nombre: $nombre <br>";
echo "Correo: $correo <br>";
echo "Mensaje: $mensaje";

?>