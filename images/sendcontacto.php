<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mail = new PHPMailer(true);

try {
    // Captura datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // ✉️ Configurar PHPMailer
    $mail->isSMTP();
    $mail->Host = 'vxct17006.avnam.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@usoe.com.ar';
    $mail->Password = 'Papill0n'; // ⚠️ Verifica que esté actualizada
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Destinatario
    $mail->setFrom('info@usoe.com.ar', 'Formulario Web USOE');
    $mail->addAddress('administracion@usoe.com.ar'); // Destinatario real

    // Asunto y cuerpo
    $mail->isHTML(true);
    $mail->Subject = "Nuevo mensaje desde el sitio web";
    $mail->Body = "
        <h2>Nuevo mensaje desde la web</h2>
        <p><strong>Nombre:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Mensaje:</strong></p>
        <p>{$message}</p>
    ";

    $mail->send();

    // Redirigir o mostrar mensaje de éxito
    echo "<script>alert('Mensaje enviado correctamente'); window.location.href='index.html';</script>";

} catch (Exception $e) {
    echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
}
?>