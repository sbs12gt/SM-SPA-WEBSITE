<?php
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['enviar'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Validar que los campos requeridos no estén vacíos
    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($celular) || empty($asunto) || empty($mensaje)) {
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe completar todos los campos.',
                }).then(() => {
                    window.location.href = '#Contact_Form'; // Cambiado para volver al formulario
                });
            </script>";
    } else {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'smspaperu@hotmail.com';
            $mail->Password = 'Elmejorspadelmundo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('smspaperu@hotmail.com', 'Sm Spa Contacto');
            $mail->addAddress($correo, $nombres . ' ' . $apellidos);
            $mail->addCC('smspaperu@hotmail.com', 'Contacto');
            $mail->Subject = 'Contacto - ' . $asunto;
            $mail->Body = "Nombres: $nombres \r\nApellidos: $apellidos \r\nCorreo: $correo \r\nCelular: $celular \r\nMensaje: $mensaje";

            // Enviar el correo
            $mail->send();

            // Redirigir después de enviar el correo
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Mail Enviado con éxito',
                    }).then(() => {
                        window.location.href = 'index.php'; // Cambiado para volver al formulario
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
                        window.location.href = 'index.php'; // Cambiado para volver al formulario
                    });
                </script>";
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Si la solicitud POST no contiene el botón 'enviar'
    echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Solicitud incorrecta',
            }).then(() => {
                window.location.href = '#Contact_Form'; // Cambiado para volver al formulario
            });
        </script>";
}
?>
