<?php
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = $_POST["correo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $celular = $_POST["celular"];
    $servicio = $_POST["servicio"];
    $selectedDate = $_POST["selectedDate"];
    $selectedTime = $_POST["selectedTime"];
    $PaymentAmount = $_POST["PaymentAmount"];


    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'smspaperu@hotmail.com';
        $mail->Password = 'Elmejorspadelmundo';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('smspaperu@hotmail.com', 'Sm Spa');
        $mail->addAddress($correo);
        $mail->Subject = 'Resumen - Reserva';

        ob_start();
        include 'includes/template_reservation_email.php';
        $htmlContent = ob_get_clean();

        $mail->isHTML(true);
        $mail->Body = $htmlContent;

        //SE ENVÍA EL CORREO 
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
