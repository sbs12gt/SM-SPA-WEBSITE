
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

  // SE PASA A LA SECCION DE MÉTODO PAGO
  $("#BtnContinuar2").on("click", function () {
    $("#Calendar_section").fadeOut(1000, function () {
      $("#Client_Information_section").fadeIn(1000, function () {
        $(this).css("display", "block");
      });
    });
  });

  // SE PASA A LA SECCION DE FORMULARIO_CLIENTE
  $("#BtnContinuar3").on("click", function () {
    if (validateClientInformationForm()) {
      var nombres = $("#validationNombres").val();
      var apellidos = $("#validationApellidos").val();
      var celular = $("#validationCelular").val();
      var correo = $("#validationCorreo").val();
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
  for (var i = 0; i < 15; i++) {
    var currentDay = new Date();
    currentDay.setDate(currentDate.getDate() + i);

    // FORMATO DE FECHA
    var formattedDate =
      currentDay.getFullYear() +
      "-" +
      ("0" + (currentDay.getMonth() + 1)).slice(-2) +
      "-" +
      ("0" + currentDay.getDate()).slice(-2);

    // Verificar si es domingo
    if (currentDay.getDay() === 0) {
      // Domingo: Agregar día inhabilitado
      $("#custom-calendar").append(
        '<div class="custom-day disabled-day" data-date="' +
          formattedDate +
          '">dom ' +
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
  
  $("#custom-calendar").on("click", ".custom-day", function () {
    var selectedDate = $(this).attr("data-date");
    console.log("Fecha seleccionada:", selectedDate);
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
  BtnContinuar3.prop("disabled", !isValid);
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
