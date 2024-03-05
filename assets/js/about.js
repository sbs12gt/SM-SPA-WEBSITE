var URL_BASE = "http://localhost:8080";

$(document).ready(function () {
  listarEmpleados();
});

function listarEmpleados() {
  $.ajax({
    url: URL_BASE + "/spa/empleados/listarEmpleadosDisponibles",
    method: "GET",
    dataType: "json",
    success: function (data) {
      $("#staffCarousel .carousel-indicators").empty();
      $("#staffCarousel .carousel-inner").empty();

      for (let i = 0; i < data.length; i++) {
        var empleado = data[i];

        // Agregar indicadores
        var indicator = `<li data-target="#staffCarousel" data-slide-to="${i}" ${
          i === 0 ? 'class="active"' : ""
        }></li>`;
        $("#staffCarousel .carousel-indicators").append(indicator);

        // Agregar elementos del carrusel
        var carouselItem = `
                    <div class="carousel-item ${i === 0 ? "active" : ""}">
                        <img src="${empleado.url_foto}" alt="${
          empleado.nombres + " " + empleado.apellidos
        }" class="img-fluid">
                        <div class="carousel-caption" style="border-radius: 30px;background-color:#005256;color:#dedede;">
                            <h4 class="tiny-window-caption" style="font-family: 'DM Serif Display';">${
                              empleado.nombres + " " + empleado.apellidos
                            }<br>${empleado.descripcion}</h4>
                        </div>
                    </div>
                `;
        $("#staffCarousel .carousel-inner").append(carouselItem);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", status, error);
    },
  });
}
