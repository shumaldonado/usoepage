<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = trim($_POST["message"]);

    // Cambiá este email por el tuyo del hosting
    $para = "info@tudominio.com";
    $asunto = "Nuevo mensaje desde el sitio web";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $headers = "From: $nombre <$email>";

    if (mail($para, $asunto, $contenido, $headers)) {
        header("Location: gracias.html");
        exit;
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>