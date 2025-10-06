<?php
// v2_validaciones_basicas

// Carpeta y archivo donde se guardarán los datos
$archivo = "data/dudas.csv";

// Recoger los datos del formulario
$correo = trim($_POST['correo']);
$modulo = $_POST['modulo'];
$asunto = trim($_POST['asunto']);
$descripcion = trim($_POST['descripcion']);

$errores = [];

// Validaciones
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no tiene un formato válido.";
}

if (strlen($asunto) > 50 || is_numeric($asunto) || empty($asunto)) {
    $errores[] = "El asunto debe tener menos de 50 caracteres y no ser numérico.";
}

if (strlen($descripcion) > 300 || empty($descripcion)) {
    $errores[] = "La descripción no puede superar los 300 caracteres.";
}

// Si hay errores, mostrar HTML con lista de errores
if (!empty($errores)) {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Errores en el formulario</title>
    </head>
    <body>
        <h2>Se han encontrado los siguientes errores:</h2>
        <ul>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>
        <p><a href='formulario.php'>Volver al formulario</a></p>
    </body>
    </html>";
    exit;
}

// Si todo es correcto, guardar en CSV
$linea = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";
file_put_contents($archivo, $linea, FILE_APPEND);

// Mostrar confirmación
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Confirmación</title>
</head>
<body>
    <h2>Tu duda ha sido registrada correctamente</h2>
    <p><a href='formulario.php'>Enviar otra duda</a></p>
</body>
</html>";
?>
