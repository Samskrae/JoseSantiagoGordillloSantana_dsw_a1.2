<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de dudas</title>
</head>
<body>
    <h2>Enviar duda</h2>
    <form action="registra_dudas.php" method="post">
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" name="correo" id="correo" required><br><br>

        <label for="modulo">Módulo:</label><br>
        <select name="modulo" id="modulo" required>
            <option value="DPL">Despliegue de Aplicaciones Web</option>
            <option value="DSW">Desarrollo web en Entorno Servidor</option>
            <option value="SOJ">Sostenibilidad aplicada al sistema productivo</option>
            <option value="CI4">Proyecto Intermodular de desarrollo de aplicaciones web</option>
            <option value="IPW">Itinerario personal para la empleabilidad II</option>
            <option value="I3D">Inglés profesional II</option>
            <option value="DOW">Diseño de interfaces web</option>
            <option value="DEW">Desarrollo web en entorno cliente</option>
        </select><br><br>

        <label for="asunto">Asunto:</label><br>
        <input type="text" name="asunto" id="asunto" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="5" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
