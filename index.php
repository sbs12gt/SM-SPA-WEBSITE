<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>SM Spa | Esencia y Belleza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include_once('includes/header.php'); ?>
    <section id="Main_Carousel">
        <div id="demo" class="carousel slide carrusel_principal" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active mensaje-a-la-derecha">
                    <img src="https://media.discordapp.net/attachments/1209921567627411577/1210016710816571452/iu.png?ex=65e906e0&is=65d691e0&hm=6ec57c8b47d667cefd9409b04ae5260bb58666ded634f0c93e3a00d9cf1fa19a&=&format=webp&quality=lossless" alt="marco floral" class="img-fluid">
                    <div>
                        <div class="contenedor"></div>
                        <div class="contenido">
                            <h3>¡Aprovecha ya!<br></h3>
                            <h1>Servicios de oferta</h1>
                            <h5>En nuestro spa encontrarás un montón de ofertas increíbles.<br>
                                <br>
                            </h5>
                            <a class="btn btn-success"  href="promotions.php">Ya!</a>
                        </div>
                    </div>
                </div>
                <!--
                <div class="carousel-item sin-mensaje">
                    <img src="assets/images/demo-carrusel_masaje_naranja.jpeg" alt="masaje naranja" class="img-fluid">
                    <div>
                        <div class="contenedor"></div>
                        <div class="contenido">
                            <h3>Masaje relajante<br></h3>
                            <h1>Servicios de oferta</h1>
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, laudantium tenetur. Qui
                                architecto minima facere, non laudantium nemo nam neque asperiores dolorem eius
                                obcaecati velit!
                                Corrupti ut asperiores id nostrum.<br>
                                <br>
                            </h5>
                            <button class="btn btn-success">Ya!</button>
                        </div>
                    </div>
                </div>
                -->
                <div class="carousel-item mensaje-a-la-izquierda">
                    <img src="https://media.discordapp.net/attachments/1209921567627411577/1210016575822757888/iu.png?ex=65e906c0&is=65d691c0&hm=fb56001ce88e89d77e2e89cd5c90efbb0dfca0c50f5442e49d26c782ecfb0012&=&format=webp&quality=lossless" alt="productos cosméticos" class="img-fluid">
                    <div>
                        <div class="contenedor"></div>
                        <div class="contenido">
                            <h3>Con los mejores expertos<br></h3>
                            <h1>Nuestros servicios disponibles</h1>
                            <h5>En nuestro spa puedes encontrar a los mejores expertos y las mejores instalaciones, para que disfrutes tu estadía con la mayor confianza.<br>
                                <br>
                            </h5>
                            <a class="btn btn-success"  href="services.php">Ya!</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>

    <section id="Locate">
        <div class="container ubicacion">
            <img src="assets/images/icono_ubicacion.svg" alt="icono de ubicación">
            <h3>Ubícanos</h3>
            <p>Encuéntranos en: 249 Jr. Padre Aguerrizabal, Pucallpa, Ucayali</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.7816841716468!2d-74.52979027076954!3d-8.389193572868056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a3bcf6a2432e13%3A0x60abfc0283e05128!2sJr.%20Padre%20Aguerrizabal%20249%2C%20Pucallpa%2025001!5e0!3m2!1ses-419!2spe!4v1667930022532!5m2!1ses-419!2spe" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="Contact_Form">
        <div class="container pt-5 pb-5">
            <!-- Título -->
            <h1 class="text-center mb-3 tiny-window" style="font-family: 'DM Serif Display';color:#005256;"><i class="fa fa-wpforms"></i> Contáctenos: </h1>
            <!-- Imagen -->
            <img class="mb-3 img-fluid" style="border-radius: 30px;" src="assets/images/demo-formulario_instalacion-spa.jpg" alt="instalación del spa">
            <!-- Formulario -->
            <div class="card" style="background-color: #005256;">
                <div class="card-body">
                    <form id="contactForm" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="Nombres" style="font-family: 'DM Serif Display';color:#dedede;">Nombres:</label>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" required>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Apellidos" style="font-family: 'DM Serif Display';color:#dedede;">Apellidos:</label>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" required>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Correo" style="font-family: 'DM Serif Display';color:#dedede;">Correo:</label>
                            <input type="email" class="form-control" placeholder="Correo" name="correo" required>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                            <div class="invalid-feedback">
                                Debe proporcionar un correo electrónico válido.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Celular" style="font-family: 'DM Serif Display';color:#dedede;">Celular:</label>
                            <input type="tel" class="form-control" placeholder="Celular" name="celular" pattern="[0-9]{9}" maxlength="9" required>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                            <div class="invalid-feedback">
                                Debe proporcionar un número de celular válido de 9 dígitos.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Asunto" style="font-family: 'DM Serif Display';color:#dedede;">Asunto:</label>
                            <input type="text" class="form-control" placeholder="Asunto" name="asunto" required>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Mensaje" style="font-family: 'DM Serif Display';color:#dedede;">Mensaje:</label>
                            <textarea class="form-control area-de-texto" placeholder="Mensaje" name="mensaje" required></textarea>
                            <div class="valid-feedback">
                                ¡Campo completado con Éxito!
                            </div>
                            <div class="invalid-feedback">
                                Debe proporcionar un mensaje.
                            </div>
                        </div>
                        <button id="enviarPreguntaBtn" type="submit" class="btn btnPregunta" name="enviar"><i class="fa fa-envelope-o"></i> Enviar Mensaje</button>
                    </form>

                </div>
                <?php include('includes/correo.php'); ?>
            </div>
        </div>
    </section>

    <style>
        .btnPregunta {
            font-family: 'DM Serif Display';
            background-color: #005256;
            border: 2px solid #dedede;
            color: #dedede;
        }

        .btnPregunta:hover{
            background-color: #dedede;
            border: 2px solid #005256;
            color: #005256;
        }
    </style>



    <?php include_once('includes/whatsapp.php'); ?>
    <?php include_once('includes/footer.php'); ?>

</body>

</html>