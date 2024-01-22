<!doctype html>
<html lang="es">
<head>
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

    <section id="Booking_table" class="mt-5 mb-5" style="position: relative;">
        <div class="container">
            <!-- ETAPAS RESERVA -->
            <div class="circles-container text-center mb-4">
                <div class="circle active"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>

            <div class="card bg-light text-dark mt-3">
                <h2 class="text-center mt-3">Elección del Servicio:</h2>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <label for="cmbServicios">Selecciona un Servicio:</label>
                            <select id="cmbServicios" class="form-control">
                                <option value="" disabled selected>Selecciona un servicio</option>
                            </select>
                        </div>
                        <div class="col-md-6 border-left">
                            <img id="servicioImagen" src="assets/images/demo-servicio_reservas.jpg" alt="Imagen" class="img-fluid rounded mb-2">
                            <h3 id="servicioTitulo">Ejemplo Servicio</h3>
                            <p id="servicioDescripcion">Siente la tranquilidad con nuestro masaje relajante, diseñado para liberar tensiones y renovar tu energía.</p>
                            <p id="servicioDuracion"><i class="fa fa-clock-o"></i> Duración: 60 minutos</p>
                            <p id="servicioPrecio"><i class="fa fa-money"></i> Precio: S/60 </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="BtnContinuar"class="btn btn-success" disabled><i class="fa fa-arrow-right"></i> Continuar</button>
                </div>
            </div>
        </div>
    </section>
    <style>
        .circles-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 20px;
        }

        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ccc;
            border: 2px solid #fff;
        }

        .circle.active {
            background-color: black;
            border-color: gray;
        }

        .service-name {
            text-align: center;
        }
    </style>
    <script src="assets/js/reservation.js"></script>
    <?php include_once('includes/footer.php'); ?>

</body>



</html>