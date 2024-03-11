function validarFormularioCorreo() {
  var nombres = document.getElementsByName("nombres")[0].value.trim();
  var apellidos = document.getElementsByName("apellidos")[0].value.trim();
  var correo = document.getElementsByName("correo")[0].value.trim();
  var celular = document.getElementsByName("celular")[0].value.trim();
  var asunto = document.getElementsByName("asunto")[0].value.trim();
  var mensaje = document.getElementsByName("mensaje")[0].value.trim();
  var cont = 0;

  var alertaNombres = document.querySelector(".f-nombres small");
  var expReg = /^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+$/;
  if (!nombres) {
    alertaNombres.textContent = "No puede estar vacío.";
  } else if (nombres.length < 2 || nombres.length > 200) {
    alertaNombres.textContent = "No puede tener menos de 2 caracteres o más de 200.";
  } else if (!expReg.test(nombres)) {
    alertaNombres.textContent = "No debe llevar números, símbolos o caracteres extraños.";
  } else {
    alertaNombres.textContent = "";
    cont++;
    var palabras = nombres.trim().split(/\s+/);
    var nombresCapitalizados = palabras.map(function (palabra) {
      return palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase();
    });
    nombres = nombresCapitalizados.join(' ');
  }

  var alertaApellidos = document.querySelector(".f-apellidos small");
  var expReg = /^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+$/;
  if (!apellidos) {
    alertaApellidos.textContent = "No puede estar vacío.";
  } else if (apellidos.length < 2 || apellidos.length > 200) {
    alertaApellidos.textContent = "No puede tener menos de 2 caracteres o más de 200.";
  } else if (!expReg.test(apellidos)) {
    alertaApellidos.textContent = "No debe llevar números, símbolos o caracteres extraños.";
  } else {
    alertaApellidos.textContent = "";
    cont++;
    var palabras = apellidos.trim().split(/\s+/);
    var apellidosCapitalizados = palabras.map(function (palabra) {
      return palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase();
    });
    apellidos = apellidosCapitalizados.join(' ');
  }

  var alertaCorreo = document.querySelector(".f-correo small");
  var expRegCorreo = /^[a-zA-Z0-9._+-]+@[a-zA-Z0-9_+-]{2,}(\.[a-zA-Z0-9_+-]{2,})+$/;
  if (!correo) {
    alertaCorreo.textContent = "No puede estar vacío.";
  } else if (correo.length > 300) {
    alertaCorreo.textContent = "No puede tener más de 300 caracteres.";
  } else if (!expRegCorreo.test(correo)) {
    alertaCorreo.textContent = "Correo no válido. No se permiten caracteres especiales o extraños.";
  } else {
    alertaCorreo.textContent = "";
    cont++;
  }

  var alertaCelular = document.querySelector(".f-celular small");
  var expRegCelular = /^\+?\d{6,50}$/;
  if (!celular) {
    alertaCelular.textContent = "No puede estar vacío.";
  } else if (celular.length < 6 || celular.length > 50) {
    alertaCelular.textContent = "No puede tener menos de 6 dígitos o más de 50.";
  } else if (!expRegCelular.test(celular)) {
    alertaCelular.textContent = "Teléfono no válido. No se permiten caracteres especiales o extraños.";
  } else {
    alertaCelular.textContent = "";
    cont++;
  }

  var aletaAsunto = document.querySelector(".f-asunto small");
  if (!asunto) {
    aletaAsunto.textContent = "No puede estar vacío.";
  } else if (asunto.length > 100) {
    aletaAsunto.textContent = "No puede tener más de 100 caracteres.";
  } else {
    aletaAsunto.textContent = "";
    cont++;
  }

  var alertaMensaje = document.querySelector(".f-mensaje small");
  if (!mensaje) {
    alertaMensaje.textContent = "No puede estar vacío.";
  } else if (mensaje.length > 1000) {
    alertaMensaje.textContent = "No puede tener más de 1000 caracteres.";
  } else {
    alertaMensaje.textContent = "";
    cont++;
  }

  if (cont == 6) {
    $.ajax({
      type: "POST",
      url: "correo2.php",
      data: {
        nombres: nombres,
        apellidos: apellidos,
        correo: correo,
        celular: celular,
        asunto: asunto,
        mensaje: mensaje,
      },
      success: function (response) {
        console.log("Envío backend exitoso");
        eval(response);
        document.getElementsByName("nombres")[0].value = "";
        document.getElementsByName("apellidos")[0].value = "";
        document.getElementsByName("correo")[0].value = "";
        document.getElementsByName("celular")[0].value = "";
        document.getElementsByName("asunto")[0].value = "";
        document.getElementsByName("mensaje")[0].value = "";
      },
      error: function (error) {
        console.log("Error backend");
        console.log(error);
      },
    });
  }
}
