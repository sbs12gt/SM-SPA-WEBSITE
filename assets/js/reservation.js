
$(document).ready(function () {
  llenarComboServicios();
  var BtnContinuar = $("#BtnContinuar");

  $("#cmbServicios").on("change", function () {
    var IdServicioElegido = $(this).val();

    if (IdServicioElegido) {
      obtenerDetallesServicio(IdServicioElegido);
      // BOTON HABILITADO
      BtnContinuar.prop("disabled", false);
    }
  });

  $("#BtnContinuar").on("click", function () {
    $("#Services_table").fadeOut(1000, function () {
      $("#Calendar_table").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  $("#BtnContinuar2").on("click", function () {
    $("#Calendar_table").fadeOut(1000, function () {
      $("#Client_Information_table").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  

});

//LLENAR LOS COMBOS DE LOS SERVICIOS 
function llenarComboServicios() {
  var cmbServicios = $("#cmbServicios");

  $.ajax({
    url: "http://localhost:8080/spa/servicio/listar",
    method: "GET",
    dataType: "json",
    success: function (data) {
      cmbServicios.empty();
      cmbServicios.append(
        '<option value="" disabled selected>Selecciona un servicio</option>'
      );

      // Llenar el combo con datos del servicio REST
      $.each(data, function (index, servicio) {
        cmbServicios.append(
          '<option value="' +
            servicio.id_servicio +
            '">' +
            servicio.nombre +
            "</option>"
        );
      });
    },
    error: function (error) {
      console.error("Error al obtener datos del servicio REST:", error);
    },
  });
}

//OBTENER LA INFORMACION DEL SERVICIO SELECCIONADO 
function obtenerDetallesServicio(servicioId) {
  $.ajax({
    url: "http://localhost:8080/spa/servicio/buscar/" + servicioId,
    method: "GET",
    dataType: "json",
    success: function (detallesServicio) {

      // INFORMACION DETALLADA DE SERVICIO ELEGIDO 
      $("#servicioImagen").attr("src", detallesServicio.url_imagen);
      $("#servicioTitulo").text(detallesServicio.nombre);
      $("#servicioDescripcion").text(detallesServicio.descripcion);
      $("#servicioDuracion").html(
        '<i class="fa fa-clock-o"></i> Duración: ' +
          detallesServicio.duracion +
          " minutos"
      );
      $("#servicioPrecio").html(
        '<i class="fa fa-money"></i> Precio: S/' + detallesServicio.precio
      );

      //INFORMACION SERVICIO ELEGIDO EN CALENDARIO
      $("#servicioCalendarTitulo").text(detallesServicio.nombre);
      $("#servicioCalendarDuracionPrecio").html(
        '<i class="fa fa-clock-o"></i> Duración: ' +
          detallesServicio.duracion +
          " minutos &nbsp;&nbsp;" +
          '<i class="fa fa-money"></i> Precio: S/' +
          detallesServicio.precio
      );

      //INFORMACION SERVICIO ELEGIDO EN CALENDARIO
      $("#servicio_Client_Information_Titulo").text(detallesServicio.nombre);
      $("#servicio_Client_Information_DuracionPrecio").html(
        '<i class="fa fa-clock-o"></i> Duración: ' +
          detallesServicio.duracion +
          " minutos &nbsp;&nbsp;" +
          '<i class="fa fa-money"></i> Precio: S/' +
          detallesServicio.precio
      );

     
    },
    error: function (error) {
      console.error("Error al obtener detalles del servicio REST:", error);
    },
  });
}

(function() {
  'use strict';

  window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
          var btnContinuar3 = document.getElementById('BtnContinuar3');

          btnContinuar3.addEventListener('click', function(event) {
              if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
              }
              form.classList.add('was-validated');
          }, false);
      });
  }, false);
})();

const Initial_minutes = 1;
let Time = Initial_minutes * 60-50;

const Countdown = document.getElementById('x_minutes_countdown');

function updateCountdown() {
  const Minutes = Math.floor(Math.max(Time, 0) / 60);
  let Seconds = Math.max(Time, 0) % 60;
  Seconds = Seconds < 10 ? '0' + Seconds : Seconds;

  Countdown.innerHTML = `<i class="fa fa-clock-o"></i> ${Minutes}:${Seconds}`;

  if (Time >= 0) {
    Time--;
    setTimeout(updateCountdown, 1000);
  } else {
    Swal.fire({
      title: 'Lo sentimos',
      html: 'El tiempo para reservar ha llegado al límite. Será redirigido a la página principal.',
      icon: 'error',
      timer: 3000,
      showConfirmButton: false,
      allowOutsideClick: false
    }).then(() => {
      window.location.href = 'index.php';
    });
  }
}
updateCountdown();




