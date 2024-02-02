var URL_BASE = "http://localhost:8080";

$(document).ready(function () {
  cargarPromociones();
});

function cargarPromociones() {
  var promocionesContainer = $(".promocionesContainer");

  $.ajax({
    url: URL_BASE + "/spa/promociones/listar",
    method: "GET",
    dataType: "json",
    success: function (promociones) {
      promocionesContainer.empty();

      for (let i = 0; i < promociones.length; i += 2) {
        var container = $('<div class="container"></div>'); // Agrega el contenedor
        var row = $('<div class="row py-3"></div>');

        for (let j = i; j < i + 2 && j < promociones.length; j++) {
          var col = $('<div class="col-md mt-4"></div>');
          var card = $('<div class="card"></div>');

          var img = $(
            '<img class="card-img-top img-fluid" alt="' +
              promociones[j].titulo +
              '">'
          );
          img.attr("src", promociones[j].url_imagen);

          var link = $(
            '<a class="stretched-link" data-toggle="modal" data-target="#myModal' +
              j +
              '"></a>'
          );

          card.append(img);
          card.append(link);
          col.append(card);

          row.append(col);

          agregarModal(promociones[j], j);
        }

        container.append(row); // Agrega la fila al contenedor
        promocionesContainer.append(container); // Agrega el contenedor al contenedor de promociones
      }
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
