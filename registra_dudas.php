<?php

$archivo = "data/dudas.csv";

$correo = trim($_POST['correo'] ?? '');
$modulo = $_POST['modulo'] ?? '';
$asunto = trim($_POST['asunto'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$temasTotal = $_POST['temas'] ?? [];

$errores = [];

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
}

if (strlen($asunto) > 50 || is_numeric($asunto) || empty($asunto)) {
    $errores[] = "El asunto no es válido. Debe tener menos de 50 caracteres y no ser numérico.";
}

if (strlen($descripcion) > 300 || empty($descripcion)) {
    $errores[] = "La descripción no es válida. Debe tener menos de 300 caracteres.";
}

if (count($temasTotal) < 1 || count($temasTotal) > 3) {
    $errores[] = "Debes seleccionar entre 1 y 3 temas relacionados.";
}

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

$temasStr = implode(", ", $temasTotal);

$linea = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\";\"$temasStr\"\n";
file_put_contents($archivo, $linea, FILE_APPEND);

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Confirmación</title>
</head>
<body>
    <h2>Tu duda ha sido registrada correctamente</h2>
    <p><strong>Temas seleccionados:</strong> $temasStr</p>
    <p><a href='formulario.php'>Enviar otra duda</a></p>
</body>
</html>";
?>
