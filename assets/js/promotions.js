var URL_BASE = "http://localhost:8080";

$(document).ready(function () {
  cargarPromociones();
});

function cargarPromociones() {
  var promocionesContainer = $(".promocionesContainer");

  $.ajax({
    url: URL_BASE + "/spa/promociones/listarPromocionesDisponibles",
    method: "GET",
    dataType: "json",
    success: function (promociones) {
      promocionesContainer.empty();
      var container = $('<div class="container"></div>');
      var row = $('<div class="row"></div>');
      var col_left = $('<div class="col-md-6"></div>');
      var col_right = $('<div class="col-md-6"></div>');
      for (let i = 0; i < promociones.length; i ++) {
          var card = $('<div class="card mt-4"></div>');
          var img = $(
            '<img class="card-img-top img-fluid" alt="' +
              promociones[i].titulo +
              '">'
          );
          img.attr("src", promociones[i].url_imagen);
          var link = $(
            '<a class="stretched-link" data-toggle="modal" data-target="#myModal' +
              i +
              '"></a>'
          );

          card.append(img);
          card.append(link);

          if (i%2==0) {
            col_left.append(card);
          } else {
            col_right.append(card);
          }

          agregarModal(promociones[i], i);

         // Agrega el contenedor al contenedor de promociones
      }
      row.append(col_left);
      row.append(col_right);
      container.append(row);
      promocionesContainer.append(container);
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud: ", status, error);
    },
  });
}

function agregarModal(promocion, index) {
  var modalId = "myModal" + index;

  var modal = $(
    '<div class="modal fade" id="' +
      modalId +
      '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>'
  );
  var modalDialog = $(
    '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable max-width-1000px"></div>'
  );
  var modalContent = $('<div class="modal-content"></div>');
  var modalBody = $('<div class="modal-body"></div>');

  var closeButton = $(
    '<button type="button" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>'
  );
  var modalImg = $(
    '<img class="img-fluid" src="' +
      promocion.url_imagen +
      '" alt="' +
      promocion.titulo +
      '">'
  );

  modalBody.append(closeButton);
  modalBody.append(modalImg);
  modalContent.append(modalBody);
  modalDialog.append(modalContent);
  modal.append(modalDialog);

  $("body").append(modal);
}
