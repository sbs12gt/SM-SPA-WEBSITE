<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>SM Spa | Esencia y Belleza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/services.js"></script>

    <?php include_once('includes/header.php'); ?>

    <section id="Services_Carousel">
        <div class="container pt-4 pb-5">
            <h1 class="text-center tiny-window mb-4" style="font-family: 'DM Serif Display';color:#005256;"><i class="fa fa-star"></i> Nuestros Servicios Destacados:</h1>
            <div id="spinner" >
                <div class="d-flex justify-content-center" style="height: 800px;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div id="demo" class="carousel slide carrusel_principal" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <!--<li data-target="#demo" data-slide-to="0" class="active"></li>-->
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner" style="border-radius: 30px;">
                    <!--
                    <div class="carousel-item active">
                        <img src="https://i0.wp.com/qpwebsite.s3.amazonaws.com/uploads/2017/10/b5_faciales.jpg?fit=1200%2C800&ssl=1" class="img-fluid" alt="aromaterapia">
                        <div class="carousel-caption" style="border-radius: 30px;background-color:#005256;color:#dedede;">
                            <h3 class="tiny-window-caption" style="font-family: 'DM Serif Display';">Tratamiento Facial Hidratante</h3>
                            <p class="tiny-window-caption_label"><i class="fa fa-clock-o"></i> Duración: x minutos | <i class="fa fa-money"></i> Precio: S/ x</p>
                        </div>
                    </div>
                    -->
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

    <section id="Service_Catalog">
        <div id="Dynamic_Service_Catalog" class="container pb-5">
        </div>
    </section>
    <?php include_once('includes/footer.php'); ?>
</body>

</html>