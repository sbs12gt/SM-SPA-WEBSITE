<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>SM Spa | Esencia y Belleza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            background-color: #F9F8FC;
            margin: 0 auto;
            padding: 0;
            font-size: 16px;
            color: #686871;
        }

        .contenido {
            max-width: 650px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F9F8FC;
            border-radius: 10px;
            text-align: right;
        }

        td{
            padding: 8px;
        }

        img {
            width: 100%;
            max-width: 650px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body style="background-color: #e6f0e5;">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="contenido" style="background-color: #e6f0e5;">
        <img src="https://media.discordapp.net/attachments/1200657075232051201/1202888731263242260/sm_spa_template_banner_email_5.png?ex=65cf186e&is=65bca36e&hm=36afa21d3645b69746b37c58dcef39bc889d453765353b186a932c83176a7cc5&=&" alt="Banner Spa">
        <img src="https://media.discordapp.net/attachments/1200657075232051201/1202885844051169311/sm_spa_template_email_4.png?ex=65cf15bd&is=65bca0bd&hm=42d7d073b3002776f1516d4a892d34effaed0d42df5aa92ce4fc7a710421c37d&=&" alt="Sm Spa Exitoso" tabindex="0">

        <div class="" style="background-color: white;text-align: center;border-radius: 20px;">
            <table style="margin: 0 auto;">
                    <tr>
                        <td>Cliente: <?php echo $nombres . ' ' . $apellidos; ?></td>
                    </tr>
                    <tr>
                        <td>Correo: <?php echo $correo; ?></td>
                    </tr>
                    <tr>
                        <td>Celular: <?php echo $celular; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="border:solid 1px rgb(235,235,235)">
                        </td>
                    </tr>
                   
                    <tr>
                        <td>Servicio: <?php echo $servicio; ?></td>
                    </tr>
                    <tr>
                        <td>Fecha - Hora Reserva: <?php echo $selectedDate .' - '.$selectedTime; ?></td>
                    </tr>
                    <tr>
                        <td>Precio: S/ <?php echo $PaymentAmount; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="border:solid 1px rgb(235,235,235)">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">© Copyright 2024, SM Spa | Todos los derechos reservados</td>
                    </tr>
            </table>
        </div>
    </div>
</body>

</html>