<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
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
        <img src="https://media.discordapp.net/attachments/1174469788207173714/1216819177793388614/smspalogo.png?ex=6601c62b&is=65ef512b&hm=f5ec6702c12615d726e091b9a3faa0fd89651603ce1fac6d2ad2df5dcaff8f56&=&format=webp&quality=lossless" alt="Banner Spa">
        <img src="https://media.discordapp.net/attachments/1174469788207173714/1216819138832629800/demo_correo.jpg?ex=6601c622&is=65ef5122&hm=bffb474d872ea029755b970c0a8fe467d0a9b0473ed6e0b418d140366102d492&=&format=webp&width=1440&height=576" alt="Sm Spa Exitoso" tabindex="0">

        <div class="" style="background-color: white;text-align: center;border-radius: 20px;">
            <table style="margin: 0 auto;">
                    <tr>
                        <td colspan="2">Cliente: <?php echo $nombres . ' ' . $apellidos; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Correo: <?php echo $correo; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Celular: <?php echo $celular; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr style="border:solid 1px rgb(235,235,235)">
                        </td>
                    </tr>
                   
                    <tr>
                        <td colspan="2">Servicio: <?php echo $servicio; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Fecha y hora: <?php echo $selectedDate .' '.$selectedTime; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr style="border:solid 1px rgb(235,235,235)">
                        </td>
                    </tr>
                    <tr>
                        <td>Precio servicio:</td>
                        <td><?php echo $precioServicio; ?></td>
                    </tr>
                    <?php if ($promocionCode !== null || $precioPromocion !== null) : ?>
                        <tr>
                            <td>Beneficio promoción:<br>(<?php echo $promocionCode; ?>)</td>
                            <td><?php echo $precioPromocion; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Precio TOTAL:</td>
                        <td><?php echo $PaymentAmount; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr style="border:solid 1px rgb(235,235,235)">
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2" style="font-weight: bold;">&copy; Copyright 2024, SM Spa | Todos los derechos reservados</td>
                    </tr>
            </table>
        </div>
    </div>
</body>

</html>