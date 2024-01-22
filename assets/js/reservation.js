
$(document).ready(function() {
    llenarComboServicios();
    var BtnContinuar = $('#BtnContinuar');

    $('#cmbServicios').on('change', function() {

        var IdServicioElegido = $(this).val();

        if (IdServicioElegido) {
            obtenerDetallesServicio(IdServicioElegido);
            // BOTON HABILITADO 
            BtnContinuar.prop('disabled', false);
        } 
    });

    
    $('.btn-success').on('click', function() {
        alert('Continuar...');
    });
});

function llenarComboServicios() {
    var cmbServicios = $('#cmbServicios');

    $.ajax({
        url: 'http://localhost:8080/spa/servicio/listar',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Limpiar opciones actuales del combo
            cmbServicios.empty();

            // Añadir la opción de placeholder
            cmbServicios.append('<option value="" disabled selected>Selecciona un servicio</option>');

            // Llenar el combo con datos del servicio REST
            $.each(data, function(index, servicio) {
                cmbServicios.append('<option value="' + servicio.id_servicio + '">' + servicio.nombre + '</option>');
            });
        },
        error: function(error) {
            console.error('Error al obtener datos del servicio REST:', error);
        }
    });
}

function obtenerDetallesServicio(servicioId) {

    $.ajax({
        url: 'http://localhost:8080/spa/servicio/buscar/' + servicioId,
        method: 'GET',
        dataType: 'json',
        success: function(detallesServicio) {
            $('#servicioImagen').attr('src', detallesServicio.url_imagen);
            $('#servicioTitulo').text(detallesServicio.nombre);
            $('#servicioDescripcion').text(detallesServicio.descripcion);
            $('#servicioDuracion').html('<i class="fa fa-clock-o"></i> Duración: ' + detallesServicio.duracion + ' minutos');
            $('#servicioPrecio').html('<i class="fa fa-money"></i> Precio: S/' + detallesServicio.precio);
        },
        error: function(error) {
            console.error('Error al obtener detalles del servicio REST:', error);
        }
    });
}
        
