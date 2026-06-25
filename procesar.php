<?php
// Validamos que los datos se hayan enviado por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos los datos del formulario de manera segura
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Redireccionamos de inmediato al usuario a Google
    header("Location: https://www.google.com");
    exit();
} else {
    // Si intentan entrar al archivo directamente sin usar el formulario, los manda a la página principal
    header("Location: index.html");
    exit();
}
?>
