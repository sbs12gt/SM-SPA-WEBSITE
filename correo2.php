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
    $asunto $_POST["asunto"];
    $mensaje = $_POST["mensaje"];


    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'smspaperu@hotmail.com';
    $mail->Password = 'Elmejorspadelmundo';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('smspaperu@hotmail.com', 'Sm Spa Contacto');
    $mail->addAddress($correo, $nombres . ' ' . $apellidos);
    $mail->addCC('smspaperu@hotmail.com', 'Contacto');
    $mail->Subject = 'Contacto - ' . $asunto;
    $mail->Body = "Nombres: $nombres \r\nApellidos: $apellidos \r\nCorreo: $correo \r\nCelular: $celular \r\nMensaje: $mensaje";

    $mail->send();

    echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Mail Enviado con éxito',
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    } catch (Exception $e) {
            // Mensaje de error
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al enviar el correo: {$mail->ErrorInfo}',
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    }
}

?>
