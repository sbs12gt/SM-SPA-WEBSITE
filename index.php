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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    <img src="assets/images/demo-carrusel_marco-floral.png" alt="marco floral" class="img-fluid">
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
                           
                        </div>
                    </div>
                </div>
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
                <div class="carousel-item mensaje-a-la-izquierda">
                    <img src="assets/images/demo-carrusel_productos-cosmeticos.jpeg" alt="productos cosméticos" class="img-fluid">
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
            <div class="card bg-light">
                <div class="card-body">
                    <form  method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres">
                            <small class="text-danger font-weight-bold"></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Correo" name="correo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Celular" name="celular">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Asunto" name="asunto">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control area-de-texto" placeholder="Mensaje" name="mensaje"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success" name="enviar">

                    </form>
                </div>
            </div>
            <?php include('includes/correo.php')?>
        </div>
    </section>

    <?php include_once('includes/whatsapp.php'); ?>
    <?php include_once('includes/footer.php'); ?>
    
</body>

</html>