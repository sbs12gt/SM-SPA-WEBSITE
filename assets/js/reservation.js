var URL_BASE = "http://localhost:8080";
var URL_FOTO = "http://localhost:8080/spa/imagenes/"

//VARIABLES PARA ALMACENAR FECHA Y HORA DE RESERVA
var selectedDate = null;
var selectedTime = null;

var nombres = null;
var apellidos = null;
var celular = null;
var correo = null;
var PaymentAmount = null;
var precioServicio = null;
var precioPromocion = null;
var servicio = null;
var idServicio = null;
var DollarValue = 3.8;
var promocionCode = null;

$(document).ready(function () {
  llenarComboServicios();

  var BtnContinuar = $("#BtnContinuar");

  //SE RECUPERA EL CODIGO DEL SERVICIO ELEGIDO
  $("#cmbServicios").on("change", function () {
    var IdServicioElegido = $(this).val();

    //SE MUESTRA LA INFORMACION DEL SERVICIO ELEGIDO
    if (IdServicioElegido) {
      obtenerDetallesServicio(IdServicioElegido);
      // BOTON CONTINUAR HABILITADO DESPUES DE SELECCION COMBO BOX
      BtnContinuar.prop("disabled", false);

      resetTimeTable();
      selectedTime = null;
    }
  });

  //SE PASA A LA SECCION DE CALENDARIO
  $("#BtnContinuar").on("click", function () {
    $("#Services_section").fadeOut(1000, function () {
      $("#Calendar_section").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  // SE PASA A LA SECCION DE FORMULARIO - VALIDACIONES DE FECHA Y HORA DE RESERVA SELECCIONADAS
  $("#BtnContinuar2").on("click", function () {
    console.log("selectedDate:", selectedDate);
    console.log("selectedTime:", selectedTime);
    // Verificar si se ha seleccionado una fecha y hora
    if (selectedDate === null || selectedTime === null) {
      // Si no se ha seleccionado una fecha o una hora, mostrar un Sweet Alert
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "Debe seleccionar una fecha y hora para continuar.",
      });
    } else {
      // SE PASA LA VALIDACION CORRECTAMENTE
      $("#Calendar_section").fadeOut(1000, function () {
        $.ajax({
          url: URL_BASE + "/spa/promociones/buscarPromocionAplicable?id_servicio=" + idServicio
          + "&fechaReserva=" + selectedDate,
          method: "GET",
          dataType: "json",
          success: function (data) {
            if (data.tipo === "PORCENTUAL") {
              promocionCode = "% " + data.descuento;
              precioPromocion = PaymentAmount * data.descuento / 100;
              PaymentAmount = PaymentAmount - precioPromocion;
            } else if (data.tipo === "EFECTIVO") {
              promocionCode = "S/ " + data.descuento;
              precioPromocion = data.descuento;
              PaymentAmount = PaymentAmount - precioPromocion;
            }
            $("#Client_Information_Promocion_Aplicable-p").html(
            `<i class="fa fa-money"></i> Título: ${data.titulo}. Beneficio: ${promocionCode}`
            );
            $("#Payment_Promocion_Aplicable-p").html(
            `<i class="fa fa-money"></i> Título: ${data.titulo}. Beneficio: ${promocionCode}`
            );
            $("#Payment_Precio_Total").html(
            `Total: S/ ${PaymentAmount.toFixed(2)}`
            );
            $("#Client_Information_Promocion_Aplicable-div").css("display", "block");
            $("#Payment_Promocion_Aplicable-div").css("display", "block");
            $("#Payment_Precio_Total").css("display", "block");
          },
          error: function (error) {
            $("#Client_Information_Promocion_Aplicable-div").css("display", "none");
            $("#Payment_Promocion_Aplicable-div").css("display", "none");
            $("#Payment_Precio_Total").css("display", "none");
            promocionCode = null;
            precioPromocion = null;
            console.error("Error al obtener datos del servicio REST:", error);
          },
        });

        $("#Client_Information_section").fadeIn(1000, function () {
          $(this).css("display", "block");
        });
        // Actualizar fecha y hora reserva en seccion Client_Information
        $("#Client_Information_Reservation_Datos").html(
          `<i class="fa fa-calendar"></i> Fecha y Hora: ${selectedDate} - ${selectedTime}`
        );

        //Actualizar fecha y hora reserva en seccion Payment
        $("#Payment_Reservation_Datos").html(
          `<i class="fa fa-calendar"></i> Fecha y Hora: ${selectedDate} - ${selectedTime}`
        );
      });
    }
  });

  //SE PASA A LA SECCION DE METODO DE PAGO
  $("#BtnContinuar3").on("click", function () {
    if (validateClientInformationForm()) {
      nombres = $("#validationNombres").val();
      var palabras = nombres.trim().split(/\s+/);
      var nombresCapitalizados = palabras.map(function (palabra) {
        return palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase();
      });
      nombres = nombresCapitalizados.join(' ');

      apellidos = $("#validationApellidos").val();
      var palabras = apellidos.trim().split(/\s+/);
      var apellidosCapitalizados = palabras.map(function (palabra) {
        return palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase();
      });
      apellidos = apellidosCapitalizados.join(' ');

      celular = $("#validationCelular").val();
      correo = $("#validationCorreo").val();
      updatePaymentSection(nombres, apellidos, celular, correo);

      $("#Client_Information_section").fadeOut(1000, function () {
        $("#Payment_section").fadeIn(1000, function () {
          $(this).css("display", "block");
        });
      });
    }
  });

  // Evento que se dispara al escribir en los campos del formulario
  $("#Client_Information_section input").on("input", function () {
    validateClientInformationForm();
    updateBtnContinuar3State();
  });

  // BOTON ATRAS DESDE CALENDARIO A SERVICIOS
  $("#BtnAtras").on("click", function () {
    $("#Calendar_section").fadeOut(1000, function () {
      $("#Services_section").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  // BOTON ATRAS DESDE CLIENTE INFORMACION A CALENDARIO
  $("#BtnAtras2").on("click", function () {
    $("#Client_Information_section").fadeOut(1000, function () {
      $("#Calendar_section").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  // BOTON ATRAS DESDE METODO DE PAGO A CLIENTE INFORMACION
  $("#BtnAtras3").on("click", function () {
    $("#Payment_section").fadeOut(1000, function () {
      $("#Client_Information_section").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  //CALENDARIO DE FECHAS
  var currentDate = new Date();
  // Crear el calendario con X DIAS
  for (var i = 0; i < 16; i++) {
    var currentDay = new Date();
    currentDay.setDate(currentDate.getDate() + i);

    // FORMATO DE FECHA
    var formattedDate =
      currentDay.getFullYear() +
      "-" +
      ("0" + (currentDay.getMonth() + 1)).slice(-2) +
      "-" +
      ("0" + currentDay.getDate()).slice(-2);

    //VERIFICAR EL DIA DESCANSO POR EL INDEX
    if (currentDay.getDay() === 1) {
      // Domingo: Agregar día inhabilitado
      $("#custom-calendar").append(
        '<div class="custom-day disabled-day" data-date="' +
          formattedDate +
          '">lun ' +
          currentDay.getDate() +
          " " +
          getMonthName(currentDay.getMonth()) +
          "</div>"
      );
    } else {
      // Otro día de la semana: Agregar día habilitado
      var dayName = getDayName(currentDay.getDay());
      var dayNumber = currentDay.getDate();
      $("#custom-calendar").append(
        '<div class="custom-day" data-date="' +
          formattedDate +
          '" onclick="(' +
          dayNumber +
          ')">' +
          dayName +
          " " +
          dayNumber +
          " " +
          getMonthName(currentDay.getMonth()) +
          "</div>"
      );
    }
  }

  // Obtener el nombre del mes
  function getMonthName(monthIndex) {
    var months = [
      "ENE",
      "FEB",
      "MAR",
      "ABR",
      "MAY",
      "JUN",
      "JUL",
      "AGO",
      "SEP",
      "OCT",
      "NOV",
      "DIC",
    ];
    return months[monthIndex];
  }

  function getDayName(dayIndex) {
    var days = ["DOM", "LUN", "MAR", "MIÉ", "JUE", "VIE", "SÁB"];
    return days[dayIndex];
  }

  paypal
    .Buttons({
      style: {
        shape: "pill",
        label: "pay",
      },
      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: [
            {
              amount: {
                value: (PaymentAmount / DollarValue).toFixed(2),
              },
            },
          ],
        });
      },
      onApprove: function (data, actions) {
        actions.order.capture().then(function (detalle_pago) {
          console.log(detalle_pago);
          PagoExitoso();
          Swal.fire({
            icon: "success",
            title: "Reserva Completada",
            text: "¡Su Reserva ha sido completada con éxito!",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "http://localhost/php/pagina_web/index.php";
            }
          });
        });
      },
      onCancel: function (data) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "El Pago no ha sido Completado.",
        });
      },
    })
    .render("#paypal-button-container");

  function PagoExitoso() {
    // Realiza la petición AJAX para enviar los datos al backend
    $.ajax({
      type: "POST",
      url: "send_reservation_details.php",
      data: {
        nombres: nombres,
        apellidos: apellidos,
        celular: celular,
        correo: correo,
        servicio: servicio,
        selectedDate: selectedDate,
        selectedTime: selectedTime,
        PaymentAmount: PaymentAmount,
        precioPromocion: precioPromocion,
        precioServicio: precioServicio,
        promocionCode: promocionCode
      },
      success: function (response) {
        console.log("Pago exitoso");
      },
      error: function (error) {
        console.log(error);
      },
    });
  }

  /*VALIDAR BOTON DE PAGO
  $("#BtnPagar").click(function () {
    if ($("input[name=MetodoPaypal]").is(":checked")) {
      realizarFuncionalidadMetodoPaypal();
    } else {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "Debe seleccionar un método de Pago Disponible.",
      });
    }
  });


  function realizarFuncionalidadMetodoPaypal() {
    var createOrder = function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: 100,
            },
          },
        ],
      });
    };


    var onApprove = function (data, actions) {
      return actions.order.capture().then(function (detalle_pago) {
        console.log(detalle_pago);
        window.location.href = "pago_completado.html";
      });
    };

    // Ejecutar en caso de cancelación
    var onCancel = function (data) {
      alert("El pago no ha sido completado");
    };

    var buttons = {
      createOrder: createOrder,
      onApprove: onApprove,
      onCancel: onCancel,
    };

    createOrder().then(function (details) {
      console.log(details);

      onApprove({ orderID: details.id }, buttons);
    });
  }/*/
  //else if ($("#metodoPago2").is(":checked")) {
  // Si el método de pago 2 está seleccionado, realiza la funcionalidad correspondiente
  //realizarFuncionalidadMetodoPago2();
  //
  //
  //
});

//CLICKS EN CLASE CUSTOM-DAY
var previousClickedDay = null;
$("#custom-calendar").on("click", ".custom-day", function () {
  // Quitar el estilo al custom-day clickeado previamente
  if (previousClickedDay !== null) {
    $(previousClickedDay).removeClass("clicked-day");
  }

  // Agregar el estilo al custom-day clickeado
  $(this).addClass("clicked-day");

  // Almacenar el custom-day clickeado para referencia futura
  previousClickedDay = this;

  selectedDate = $(this).attr("data-date");

  selectedTime = null;
  // Desvanecer la tabla de horarios actual
  $("#custom-time_picker").fadeOut(500, function () {
    mostrarTablaHorarios();
    resetTimeTable();
    // Mostrar la tabla de horarios con un efecto de desvanecimiento
    $("#custom-time_picker").fadeIn(500);
  });
});

//REESTABLECER TABLA DE HORARIOS A SUS VALORES INICIALES , SIN LA CLASE SELECTED TIME
function resetTimeTable() {
  $(".custom-time").removeClass("selected-time");
}

//CALENDARIO - ELEGIR LA HORA
function mostrarTablaHorarios() {
  var timePickerContainer = $("#custom-time_picker");

  // Vaciar el contenido existente antes de agregar una nueva tabla
  timePickerContainer.empty();

  // Crear la nueva tabla
  var timeTable = document.createElement("table");
  timeTable.classList.add("table", "table-borderless", "text-center");
  timeTable.style.tableLayout = "fixed";
  var body = timeTable.createTBody();
  var horaInicio = new Date("2024-01-01T09:30:00");
  var horaFin = new Date("2024-01-01T17:15:00");
  var intervalo = 15;

  while (horaInicio <= horaFin) {
    var row = body.insertRow();
    for (var i = 0; i < 4; i++) {
      var cell = row.insertCell();
      cell.classList.add("custom-time");
      cell.textContent = horaInicio.toLocaleTimeString([], {
        hour: "2-digit",
        minute: "2-digit",
      });
      horaInicio.setMinutes(horaInicio.getMinutes() + intervalo);
    }
  }
  // Agregar la tabla al contenedor
  timePickerContainer.append(timeTable);
}

//COMPORTAMIENTO DE ELECCION DE HORARIO:
$("#custom-time_picker").on("click", ".custom-time", function () {
  // Eliminar la clase 'selected-time' de todos los elementos 'custom-time'
  $(".custom-time").removeClass("selected-time");

  // Agregar la clase 'selected-time' al elemento clickeado
  $(this).addClass("selected-time");

  // Lógica adicional al hacer clic en un elemento con la clase "custom-time"
  selectedTime = $(this).text();
  console.log("Hora seleccionada:", selectedTime);

  // Validar hora, y fecha, y servicio
  $.ajax({
    url: URL_BASE + "/spa/reservas/verificarReservaDisponible?id_servicio=" + idServicio
    + "&fecha=" + selectedDate + "&hora=" + selectedTime,
    method: "GET",
    dataType: "text",
    success: function (data) {
      //SI GUSTAS, PUEDES PONERLE UN EVENTE DE ÉXITO
    },
    error: function (error) {
      $(".custom-time").removeClass("selected-time");
      selectedTime = null;
      Swal.fire({
        icon: "warning",
        title: "Tenemos un problema.",
        text: error.responseText,
      });
      console.error("Error al obtener datos del servicio REST:", error);
    },
  });
});

//LLENAR LOS COMBOS DE LOS SERVICIOS
function llenarComboServicios() {
  var cmbServicios = $("#cmbServicios");

  $.ajax({
    url: URL_BASE + "/spa/servicios/listarServiciosDisponibles",
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
    url: URL_BASE + "/spa/servicios/buscar/" + servicioId,
    method: "GET",
    dataType: "json",
    success: function (detallesServicio) {
      idServicio = detallesServicio.id_servicio;
      servicio = detallesServicio.nombre;
      // INFORMACION DETALLADA DE SERVICIO ELEGIDO
      $("#servicioImagen").attr("src", URL_FOTO + detallesServicio.url_imagen);
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

      //INFORMACION SERVICIO ELEGIDO EN FORMULARIO CLIENTE
      $("#servicio_Client_Information_Titulo").text(detallesServicio.nombre);
      $("#servicio_Client_Information_DuracionPrecio").html(
        '<i class="fa fa-clock-o"></i> Duración: ' +
          detallesServicio.duracion +
          " minutos &nbsp;&nbsp;" +
          '<i class="fa fa-money"></i> Precio: S/' +
          detallesServicio.precio
      );

      //INFORMACION SERVICIO ELEGIDO EN METODO DE PAGO
      $("#servicio_Payment_Titulo").text(detallesServicio.nombre);
      $("#servicio_Payment_DuracionPrecio").html(
        '<i class="fa fa-clock-o"></i> Duración: ' +
          detallesServicio.duracion +
          " minutos &nbsp;&nbsp;" +
          '<i class="fa fa-money"></i> Precio: S/' +
          detallesServicio.precio
      );

      precioServicio = detallesServicio.precio
      PaymentAmount = precioServicio;
    },
    error: function (error) {
      console.error("Error al obtener detalles del servicio REST:", error);
    },
  });
}

//VALIDAR INFORMACION CLIENTE
function validateClientInformationForm() {
  var form = $("#Client_Information_section form")[0];
  if (form.checkValidity() === false) {
    form.classList.add("was-validated");
    return false;
  }
  return true;
}

//ACTUALIZAR ESTADO BOTON CONTINUAR 3
function updateBtnContinuar3State() {
  var isValid = validateClientInformationForm();
  //BtnContinuar3.prop("disabled", !isValid);
}

function updatePaymentSection(nombres, apellidos, celular, correo) {
  // Actualizar el contenido de Payment_Datos_Cliente con la información del cliente
  $("#Payment_Datos_Cliente").html(
    '<p><i class="fa fa-user-circle"></i> ' +
      nombres +
      " " +
      apellidos +
      "</p>" +
      '<p><i class="fa fa-phone-square"></i> ' +
      celular +
      "</p>" +
      '<p><i class="fa fa-envelope-o"></i> ' +
      correo +
      "</p>"
  );
}

//CUENTA REGRESIVA - COUNTDOWN
const Initial_minutes = 5; //MINUTOS DE DURACION COUNTDOWN
let Time = Initial_minutes * 60;
const Countdown = document.getElementById("x_minutes_countdown");
function updateCountdown() {
  const Minutes = Math.floor(Math.max(Time, 0) / 60);
  let Seconds = Math.max(Time, 0) % 60;
  Seconds = Seconds < 10 ? "0" + Seconds : Seconds;
  Countdown.innerHTML = `<i class="fa fa-clock-o"></i> ${Minutes}:${Seconds}`;
  if (Time >= 0) {
    Time--;
    setTimeout(updateCountdown, 1000);
  } else {
    Swal.fire({
      title: "Lo sentimos",
      html: "El tiempo para reservar ha llegado al límite. Será redirigido a la página principal.",
      icon: "error",
      timer: 3000,
      showConfirmButton: false,
      allowOutsideClick: false,
    }).then(() => {
      window.location.href = "index.php";
    });
  }
}
updateCountdown();
