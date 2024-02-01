var URL_BASE = "http://localhost:8080";

$(document).ready(function () {
  cargarServiciosPopulares();
  listarServicios();
});

function calcularTarjetasPorFila() {
  var anchoVentana = $(window).width();

  if (anchoVentana >= 1200) {
    return 3;
  } else if (anchoVentana >= 992) {
    return 3;
  } else {
    return 2;
  }
}

function listarServicios() {
  $.ajax({
    url: URL_BASE + "/spa/servicios/listarServiciosDisponibles",
    method: "GET",
    dataType: "json",
    success: function (data) {
      $("#Dynamic_Service_Catalog").empty();

      var tarjetasPorFila = calcularTarjetasPorFila();

      for (let i = 0; i < data.length; i += tarjetasPorFila) {
        var row = $('<div class="row pb-5"></div>');

        for (let j = i; j < i + tarjetasPorFila && j < data.length; j++) {
          var servicio = data[j];
          var card = `
            <div class="col-sm-${
              12 / tarjetasPorFila
            }"> <!-- Calcula el ancho de la columna dinámicamente -->
                <div class="card mt-3">
                    <img class="card-img-top img-fluid" src="${
                      servicio.url_imagen
                    }" alt="${servicio.nombre}" width="300" height="250">
                    <div class="card-body">
                        <h4 class="card-title" style="font-family: 'DM Serif Display';
                        src: url(../fonts/DMSerifDisplay-Regular.ttf);">${servicio.nombre}</h4>
                        <p class="card-text">${servicio.descripcion}</p>
                    </div>
                    <div class="card-footer">
                        <p><i class="fa fa-clock-o"></i> Duración: ${
                          servicio.duracion
                        } minutos</p>
                        <p><i class="fa fa-money"></i> Precio: S/${
                          servicio.precio
                        }</p>
                    </div>
                </div>
            </div>
          `;

          row.append(card);
        }
        $("#Dynamic_Service_Catalog").append(row);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud :", status, error);
    },
  });
}

function cargarServiciosPopulares() {
  $.ajax({
    url: URL_BASE + "/spa/servicios/listarServiciosPopulares",
    method: "GET",
    dataType: "json",
    success: function (data) {
      $("#demo .carousel-indicators").empty();
      $("#demo .carousel-inner").empty();

      for (let i = 0; i < data.length; i++) {
        var servicio = data[i];

        // Agregar indicadores
        var indicator = `<li data-target="#demo" data-slide-to="${i}" ${
          i === 0 ? 'class="active"' : ""
        }></li>`;
        $("#demo .carousel-indicators").append(indicator);

        // Agregar elementos del carrusel
        var carouselItem = `
          <div class="carousel-item ${i === 0 ? "active" : ""}">
            <img src="${servicio.url_imagen}" alt="${
          servicio.nombre
        }" class="img-fluid">
            <div class="carousel-caption" style="border-radius: 30px;background-color:#005256;color:#dedede;">
              <h3 class="tiny-window-caption" style="font-family: 'DM Serif Display';
              src: url(../fonts/DMSerifDisplay-Regular.ttf);">${servicio.nombre}</h3>
              <p class="tiny-window-caption_label"><i class="fa fa-clock-o"></i> Duración: ${
                servicio.duracion
              } minutos |  <i class="fa fa-money"></i> Precio: S/${
                servicio.precio
              }</p>
            </div>
          </div>
        `;
        $("#demo .carousel-inner").append(carouselItem);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", status, error);
    },
  });
}

// Volver a listar los servicios cuando cambia el tamaño de la ventana
$(window).resize(function () {
  listarServicios();
});
