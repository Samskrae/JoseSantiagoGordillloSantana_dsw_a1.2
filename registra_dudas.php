<?php
$archivo = "data/dudas.csv";
$correo = $_POST['correo'];
$modulo = $_POST['modulo'];
$asunto = $_POST['asunto'];
$descripcion = $_POST['descripcion'];

$linea = "$correo;$modulo;$asunto;$descripcion\n";

file_put_contents($archivo, $linea, FILE_APPEND);

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
