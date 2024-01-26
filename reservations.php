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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include_once('includes/header.php'); ?>
    <script>
        Swal.fire({
            title: 'Reserva de Servicios en SM SPA',
            text: 'Tiene un tiempo límite de 5 minutos para reservar.',
            timer: 1500,
            showConfirmButton: false,
            allowOutsideClick: false,
            icon: 'success',
        });
    </script>
    <section id="Countdown_section" class="mt-1">

        <div class="container">
            <div class="countdown">
                <h5 id="x_minutes_countdown"><i class="fa fa-clock-o"></i></h5>
            </div>
        </div>

    </section>
    <!--ELECCION DEL SERVICIO---->
    <section id="Services_section" class="mt-5 mb-5" style="position: relative;">
        <div class="container">

            <!-- ETAPAS RESERVA -->
            <div class="circles-container mt-3 text-center mb-4">
                <div class="circle active"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>

            <div class="card bg-light text-dark mt-3">
                <h3 class="text-center mt-3">Elección del Servicio:</h3>

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
                    <button type="button" id="BtnContinuar" class="btn btn-success" disabled><i class="fa fa-arrow-right"></i> Continuar</button>
                </div>
            </div>
        </div>
    </section>

    <!--CALENDARIO DE RESERVAS---->
    <section id="Calendar_section" class=" hidden mt-5 mb-5" style="position: relative;display: none;">
        <div class="container">
            <!-- ETAPAS RESERVA -->
            <div class="circles-container text-center  mb-4">
                <div class="circle"></div>
                <div class="circle active"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>

            <div class="card bg-light text-dark mt-3">
                <h3 class="text-center mt-3">Elección Fecha y Hora:</h3>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <h5 id="servicioCalendarTitulo">Ejemplo Servicio</h5>
                            <p id="servicioCalendarDuracionPrecio">
                                <i class="fa fa-clock-o"></i> Duración: 60 minutos &nbsp;&nbsp;
                                <i class="fa fa-money"></i> Precio: S/60
                            </p>
                            <!-- Agrega el contenedor del calendario justo debajo de la información de duración y precio -->
                            <div id="custom-calendar" class="text-center"></div>
                        </div>
                        <div class="col-md-6 border-left">
                            <h6 class="mt-4"><br><i class="	fa fa-hand-o-down"></i> Seleccione un horario:</h6>
                            <div id="custom-time_picker" class="text-center mt-1"></div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="BtnAtras" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</button>
                    <button type="button" id="BtnContinuar2" class="btn btn-success"><i class="fa fa-arrow-right"></i> Continuar</button>
                </div>
            </div>
        </div>
    </section>

    <!--CLIENTE INFORMACION---->
    <section id="Client_Information_section" class=" hidden mt-5 mb-5" style="position: relative;display: none;">
        <div class="container">
            <!-- ETAPAS RESERVA -->
            <div class="circles-container text-center mb-4">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle active"></div>
                <div class="circle"></div>
            </div>

            <div class="card bg-light text-dark mt-3">
                <h3 class="text-center mt-3">Datos del Cliente:</h3>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <h5 id="servicio_Client_Information_Titulo">Ejemplo Servicio</h5>
                            <p id="servicio_Client_Information_DuracionPrecio">
                                <i class="fa fa-clock-o"></i> Duración: 60 minutos &nbsp;&nbsp;
                                <i class="fa fa-money"></i> Precio: S/60
                            </p>
                            <h5>Datos Reserva:</h5>
                            <p id="Client_Information_Reservation_Datos">
                                <i class="fa fa-calendar"></i> Fecha y Hora: 2024/01/2024 - 03:50
                            </p>
                        </div>
                        <div class="col-md-6 border-left">
                            <div class="card-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label for="Nombres">Nombres</label>
                                        <input type="text" class="form-control" id="validationNombres" placeholder="Nombres" required>
                                        <div class="valid-feedback">
                                            ¡Campo completado con Éxito!
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Apellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="validationApellidos" placeholder="Apellidos" required>
                                        <div class="valid-feedback">
                                            ¡Campo completado con Éxito!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Celular">Celular</label>
                                        <input type="tel" class="form-control" id="validationCelular" placeholder="Celular" pattern="[0-9]{9}" maxlength="9" required>
                                        <div class="valid-feedback">
                                            ¡Campo completado con Éxito!
                                        </div>
                                        <div class="invalid-feedback">
                                            Debe proporcionar un número de celular válido de 9 dígitos.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Correo">Correo</label>
                                        <input type="email" class="form-control" id="validationCorreo" placeholder="Correo" required>
                                        <div class="valid-feedback">
                                            ¡Campo completado con Éxito!
                                        </div>
                                        <div class="invalid-feedback">
                                            Debe proporcionar un correo electrónico válido.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="BtnAtras2" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</button>
                    <button type="submit" id="BtnContinuar3" class="btn btn-success"><i class="fa fa-arrow-right"></i> Continuar</button>
                </div>
            </div>
        </div>
    </section>

    <!--METODO DE PAGO---->
    <section id="Payment_section" class=" hidden mt-5 mb-5" style="position: relative;display: none;">
        <div class="container">
            <!-- ETAPAS RESERVA -->
            <div class="circles-container text-center mb-4">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle active"></div>
            </div>

            <div class="card bg-light text-dark mt-3">
                <h3 class="text-center mt-3">Elección Método Pago:</h3>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <h5 id="servicio_Payment_Titulo">Ejemplo Servicio</h5>
                            <p id="servicio_Payment_DuracionPrecio">
                                <i class="fa fa-clock-o"></i> Duración: 60 minutos &nbsp;&nbsp;
                                <i class="fa fa-money"></i> Precio: S/60
                            </p>
                            <h5>Datos Reserva:</h5>
                            <p id="Payment_Reservation_Datos">
                                <i class="fa fa-calendar"></i> Fecha y Hora: 2024/01/2024 - 03:50
                            </p>
                            <h5>Datos Cliente:</h5>
                            <p id="Payment_Datos_Cliente">
                                <i class="fa fa-user-circle"></i>
                                <i class="fa fa-phone-square"></i>
                                <i class="fa fa-envelope-o"></i>
                            </p>



                        </div>
                        <div class="col-md-6 border-left">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="BtnAtras3" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atrás</button>
                    <button type="submit" id="BtnPagar" class="btn btn-success"><i class="fa fa-credit-card"></i> Pagar</button>
                </div>
            </div>
        </div>
    </section>


    <style>
        :root {

            --white_spa: #dedede;
            --white_disabled_spa: #828282;
            --green_spa: #005256;
        }

        .countdown {
            background-color: var(--green_spa);
            color: var(--white_spa);
            float: right;
            border: 1px solid #ccc;
            border-radius: 30px;
            padding: 3px 15px;
        }

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

        .custom-day {
            display: inline-block;
            width: 100px;
            height: 100px;
            text-align: center;
            margin: 5px;
            cursor: pointer;
            border: 1px solid var(--green_spa);
            border-radius: 5px;
            line-height: 100px;
            text-transform: uppercase;
            transition: background-color 0.3s;
            background-color: var(--white_spa);
            color: var(--green_spa);
        }


        .custom-day:hover,
        .custom-day.clicked-day {
            background-color: var(--green_spa);
            color: var(--white_spa);
            border: 1px solid var(--green_spa);
            font-weight: bold;
        }

        .disabled-day {
            background-color: var(--white_disabled_spa);
            color: var(--white_spa);
            cursor: not-allowed;
            pointer-events: none;
        }

        .day-name {
            font-size: 14px;
        }

        .custom-time {
            width: 25%;
            cursor: pointer;
            padding: 5px;
            transition: background-color 0.3s;
            color: var(--green_spa);
        }

        .custom-time:hover,
        .custom-time.selected-time {
            background-color: var(--green_spa);
            color: var(--white_spa);
            font-weight: bold;

        }

        #custom-time_picker {
            display: none;
            
        }


        #custom-time_picker table {
            border-collapse: separate;
            border-spacing: 10px;
        }

        #custom-time_picker td {
            border: 1px solid var(--green_spa);
            padding: 8px;
            text-align: center;
            border-radius: 10px;
            /* Ajusta el valor según sea necesario */
        }
    </style>
    <script src="assets/js/reservation.js"></script>
    <?php include_once('includes/footer.php'); ?>

</body>



</html>