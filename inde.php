<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar correo>/title>
</head>
<style>
    body {
        text-align: center;
    }
</style>

<body>
    <h2>Formulario de contacto</h2>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea><br>
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>

<?php
if (isset($_POST["enviar"])) {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    $destinatario = "victo8078@gmail.com";
    $asunto = "Nuevo mensaje de $email";

    $contenido = "Nombre: $nombre \n";
    $contenido .= "Email: $email \n";
    $contenido .= "Mensaje: $mensaje";

    $header = "victo8078@gmail.com";

    if (mail($destinatario, $asunto, $contenido, $header)) {
        echo "<script>alert('El correo se envió correctamente :)')</script>";
    } else {
        echo "<script>alert('El correo no se pudo enviar, inténtelo nuevamente :(')</script>";
    }
}
?>
