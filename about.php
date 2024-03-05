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

    <?php include_once('includes/header.php'); ?>

    <section id="Introduction">
        <div class="container-fluid color-sm-spa">
            <div class="container padding-vertical-50px">
                <div class="row">
                    <div class="col-md">
                        <h3 class="dm-serif-display">Introducción</h3>
                    </div>
                    <div class="col-md">
                        <p>
                            <strong>Dueña: </strong>Sandra Muñoz. <br>
                            <strong>Rubro: </strong>Salud, belleza y bienestar. <br>
                            <br>
                            El spa fue ideado por la dueña Sandra Muñoz como complemento de su gimnasio X-TREME GYM. En
                            palabras de ella: "que la gran mayoría de personas, por la pandemia o una series de
                            factores,
                            necesita una vida más sana, un entono más sano. Esto se logra con una buena alimentación y
                            ejercicio físico, pero, también, necesitamos un mejor equilibrio emocional. Necesitamos
                            alejarnos de todo el estrés, de todo el ruido. Así que un spa va de acorde con lo que quiero
                            lograr. Quiero que nuestros clientes se sientan y se vean bien".
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Carousel_of_About">
        <div class="container">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner" style="border-radius: 30px;">
                    <div class="carousel-item active">
                        <img src="assets/images/demo-carrusel_clientas.jpg" class="img-fluid" alt="clientas">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/demo-carrusel_piscina.jpg" class="img-fluid" alt="piscina">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/demo-carrusel_salon.jpg" class="img-fluid" alt="salón">
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
        </div>
    </section>

    <section id="Mission_and_Vision">
        <div class="container-fluid color-sm-spa">
            <div class="container padding-vertical-50px">
                <h3 class="dm-serif-display">¿Qué queremos?</h3>
                <br>
                <div class="row">
                    <div class="col-md">
                        <h4 class="alex-brush-25px">Misión</h4>
                        <p>
                            "Por ahora queremos recuperar los niveles prepandemia. Nuestro negocio ha sido relegado
                            porque
                            la gente lo ha visto poco importante, secundario. En la época actual hay muchas
                            movilizaciones
                            [sociales], mucha imagen de violencia en la tele; la gente necesita un lugar para relajarse,
                            para separarse de este entorno tan dañino que vivimos actualmente."
                        </p>
                    </div>
                    <div class="col-md">
                        <h4 class="alex-brush-25px">Visión</h4>
                        <p>
                            "Como visión sería que las personas que vengan a entrenar [a mi gimnasio] vayan a un lindo
                            lugar
                            donde relajarse, ¿no? Que entiendan que no solo es lo físico, sino también la salud mental.
                            Además eso [la relajación] ayuda a tener mucho más fuerza para entrenar, eso es lo que le
                            digo a
                            mis chicos y chicas [del gimnasio]."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Staff_Carousel">
        <div class="container carrusel-personal">
            <div class="titulo">
                <h1 class="text-center tiny-window mb-2" style="font-family: 'DM Serif Display';color:#005256;"><i class="fa fa-users"></i> Nuestro Equipo de Expertos:</h1>
            </div>
            <div class="carrusel">
                <div id="staffCarousel" class="carousel slide" data-ride="carousel">

                    <!-- The slideshow -->
                    <div class="carousel-inner" style="border-radius: 30px;">
                        <div class="carousel-item active">
                            <img src="assets/images/sm_spa_template_default.png" class="img-fluid" alt="template">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#staffCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#staffCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <?php include_once('includes/footer.php'); ?>
    <script src="assets/js/about.js"></script>
</body>

</html>