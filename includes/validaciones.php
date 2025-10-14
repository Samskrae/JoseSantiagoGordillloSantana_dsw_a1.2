<?php
function validarDatos($correo, $modulo, $asunto, $descripcion, $temasTotal) {
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

    return $errores;
}
?>
