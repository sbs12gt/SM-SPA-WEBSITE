<?php

if (isset($_POST['enviar'])) {
    if (
        !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['correo']) &&
        !empty($_POST['celular']) && !empty($_POST['asunto']) && !empty($_POST['mensaje'])
    ) {

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $cuerpo = "Nombres: " . $nombres . "\r\n" .
            "Apellidos: " . $apellidos . "\r\n" .
            "Correo: " . $correo . "\r\n" .
            "Celular: " . $celular . "\r\n" .
            "Mensaje: " . $mensaje;

        $header = "From: noreply@email.com" . "\r\n";
        $header .= "Reply-To:noreply@email.com" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();

        $mail = mail($correo, $asunto, $cuerpo, $header);

        if ($mail) {
            echo ("<h1>Mail Enviado con éxito</h1>");
        } else {
            echo ("<h1>Error al enviar el correo</h1>");
        }
    } else {
        echo ("<h1>Por favor, completa todos los campos</h1>");
    }
}
