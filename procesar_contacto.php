<?php
// Configuración
$destinatario = "tu_email@ejemplo.com"; // Cambia esto por tu dirección de correo
$asunto = "Nuevo mensaje desde el formulario de contacto";

// Verifica si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtén y valida los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validaciones básicas
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Por favor, completa todos los campos.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Por favor, proporciona una dirección de correo válida.");
    }

    // Crear el contenido del correo
    $contenido = "Has recibido un nuevo mensaje desde el formulario de contacto:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Enviar el correo
    $cabeceras = "From: $email\r\n";
    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h1>¡Gracias, $nombre!</h1>";
        echo "<p>Tu mensaje se ha enviado correctamente.</p>";
        echo "<a href='contacto.html' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #8c4a0b; color: #fff; text-decoration: none; border-radius: 5px;'>Volver a la página de contacto</a>";
        echo "</div>";
    } else {
        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
        echo "<h1>Lo sentimos</h1>";
        echo "<p>No se pudo enviar tu mensaje. Inténtalo más tarde.</p>";
        echo "<a href='contacto.html' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #8c4a0b; color: #fff; text-decoration: none; border-radius: 5px;'>Volver a la página de contacto</a>";
        echo "</div>";
    }
} else {
    echo "Método no permitido.";
}
