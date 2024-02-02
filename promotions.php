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
    <script src="assets/js/promotions.js"></script>

    <?php include_once('includes/header.php'); ?>

    <section id="Promotions" class="mb-5">
        <div class="pt-4">
            <h1 class="text-center tiny-window" style="font-family: 'DM Serif Display';color:#005256;"><i class="fa fa-gift"></i> Nuestras Promociones Vigentes:</h1>
        </div>
        <div class="promocionesContainer">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md mt-4">
                        <div class="card">
                            <img class="card-img-top" src="assets/images/sm_spa_template_default.png" alt="promoción 1">
                            <a type="button" class="stretched-link" data-toggle="modal" data-target="#myModal"></a>
                        </div>
                    </div>
                    <div class="col-md mt-4">
                        <div class="card">
                            <img class="card-img-top" src="assets/images/sm_spa_template_default.png" alt="promoción 2">
                            <a type="button" class="stretched-link" data-toggle="modal" data-target="#myModal2"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable max-width-1000px">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img class="img-fluid" src="assets/images/sm_spa_template_default.png" alt="promoción 1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable max-width-1000px">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img class="img-fluid" src="assets/images/sm_spa_template_default.png" alt="promoción 2">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>