$(document).ready(function () {
  notiBaja();
  ocultarMensajes();

  $("#formularioClienteF").validate({
    errorClass: "validacion-error",
    rules: {
      nombre: "required",
      apellido: "required",
      fec_nac: "required",
      sexo: { ForSex: true },
      tipodocumento: { ForDoc: true },
      doc: {
        required: true,
        digits: true,
      },
    },
    messages: {
      nombre: "Por favor ingrese el nombre del cliente",
      apellido: "Por favor ingree el apellido",
      fec_nac: "Por favor ingrese la fecha de nacimiento",
    },
  });
  $.validator.addMethod(
    "ForSex",
    function (value, element, param) {
      return value != "0";
    },
    "Por favor seleccione el genero"
  );
  $.validator.addMethod(
    "ForDoc",
    function (value, element, param) {
      return value != "0";
    },
    "Por favor seleccione el documento"
  );

  $("#formularioClienteJ").validate({
    errorClass: "validacion-error",
    rules: {
      razonSocial: "required",
      obraSocial: "required",
      nroIngresoBruto: {
        required: true,
        digits: true,
      },
      cc: { ForCC: true },
    },
    messages: {
      razonSocial: "Por favor ingrese la razon social",
      obraSocial: "Por favor ingrese la obra social",
      nroIngresoBruto: "Por favor ingrese el nro de ingreso Bruto",
    },
  });
  $.validator.addMethod(
    "ForCC",
    function (value, element, param) {
      return value != "0";
    },
    "Por favor seleccione el contrato constitutivo"
  );

  let fechaHoy = new Date();
  fechaHoy.setMinutes(fechaHoy.getMinutes() - fechaHoy.getTimezoneOffset());

  let fechaFormateada = fechaHoy.toISOString().split("T")[0];

  $("#fechaInicio").val(fechaFormateada);
});
function notiBaja() {
  let darBaja = document.getElementsByClassName("darDeBajaButton");

  for (let i = 0; i < darBaja.length; i++) {
    darBaja[i].addEventListener("click", (ev) => {
      let ventanaconfir = confirm("¿Estás seguro de querer borrar?");
      if (ventanaconfir) {
        // Corregimos la asignación de href
        window.location.href = darBaja[i].getAttribute("href");
      } else {
        ev.preventDefault();
        return;
      }
    });
  }
}
function ocultarMensajes() {
  let contenedorMensajes = document.getElementById("msj-container");
  if (contenedorMensajes) {
    let mensajes = contenedorMensajes.querySelectorAll(".show");
    mensajes.forEach(function (mensaje) {
      setTimeout(function () {
        mensaje.classList.add("hidden");
      }, 3000);
    });
  }
}

window.addEventListener("load", ocultarMensajes);

document.getElementById("btnFisicos").addEventListener("click", function () {
  let filas = document.querySelectorAll(".clienteFisico, .clienteJuridico");
  filas.forEach(function (fila) {
    fila.style.display = "none";
  });

  let filasFisicas = document.querySelectorAll(".clienteFisico");
  filasFisicas.forEach(function (filaFisica) {
    filaFisica.style.display = "table-row";
  });
});

document.getElementById("btnJuridicos").addEventListener("click", function () {
  let filas = document.querySelectorAll(".clienteFisico, .clienteJuridico");
  filas.forEach(function (fila) {
    fila.style.display = "none";
  });

  let filasJuridicas = document.querySelectorAll(".clienteJuridico");
  filasJuridicas.forEach(function (filaJuridica) {
    filaJuridica.style.display = "table-row";
  });
});

document
  .getElementById("btnMostrarTodos")
  .addEventListener("click", function () {
    let filas = document.querySelectorAll(".clienteFisico, .clienteJuridico");
    filas.forEach(function (fila) {
      fila.style.display = "table-row";
    });
  });

function formularioCliente() {
  //let tipoPersona = document.getElementById("tipoPersona").value;
  let tipoPersona = $("#tipoPersona").val();
  //let formPersonaFisica = document.getElementById("formPersonaFisica");
  let formPersonaFisica = $("#formPersonaFisica");
  //let formPersonaJuridica = document.getElementById("formPersonaJuridica");
  let formPersonaJuridica = $("#formPersonaJuridica");

  if (tipoPersona == 2) {
    //formPersonaFisica.style.display = "block";
    //formPersonaJuridica.style.display = "none";
    formPersonaFisica.show();
    formPersonaJuridica.hide();
  } else if (tipoPersona == 1) {
    //formPersonaJuridica.style.display = "block";
    //formPersonaFisica.style.display = "none";
    formPersonaJuridica.show();
    formPersonaFisica.hide();
  } else if (tipoPersona == 0) {
    //formPersonaJuridica.style.display = "none";
    //formPersonaFisica.style.display = "none";
    formPersonaFisica.hide();
    formPersonaJuridica.hide();
  }
}
