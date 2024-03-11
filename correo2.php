<?php
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $celular = $_POST["celular"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'live.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'api';
        $mail->Password = '0356ba4913480068a618411e84edef95';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        $mail->setFrom('mailtrap@demomailtrap.com', 'Sm Spa Contacto');
        $mail->addAddress($correo, $nombres . ' ' . $apellidos);
        //$mail->addCC('smspaperu@hotmail.com', 'Contacto');
        $mail->Subject = 'SM Spa - ' . $asunto;
        $mail->Body = "Nombres: $nombres \r\nApellidos: $apellidos \r\nCorreo: $correo \r\nCelular: $celular \r\nMensaje: $mensaje";

        $mail->CharSet = 'UTF-8'; // Configura la codificación de caracteres

        $mail->send();
    
        echo "Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Mail enviado con éxito',
                });";
    } catch (Exception $e) {
        // Mensaje de error
        echo "Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al enviar el correo: {$mail->ErrorInfo}',
                });";
    }
}

?>