$(document).ready(function () {
  $("#formularioFisico").show();
  $("#formularioJuridico").hide();

  $("#tipoPersona").change(function () {
    $("#formularioFisico").hide();
    $("#formularioJuridico").hide();

    if ($(this).val() == 1) {
      $("#formularioFisico").show();
    } else if ($(this).val() == 2) {
      $("#formularioJuridico").show();
    }
  });

  $("#formularioContacto").validate({
    errorClass: "validacion-error",
    rules: {
      tipoContacto: { requiredSelect: true },
      contactoValor: {
        required: true,
        customEmail: function (element) {
          return $("#tipoContacto").val() === "3";
        },
      },
    },
    messages: {
      tipoContacto: {
        required: "Por favor, seleccione el tipo de contacto.",
      },
      contactoValor: {
        required: "Por favor, ingrese el valor de contacto.",
      },
    },
  });
  $.validator.addMethod(
    "customEmail",
    function (value, element) {
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      return this.optional(element) || emailRegex.test(value);
    },
    "Por favor, ingrese un formato de correo electrónico válido."
  );
  $("#formularioDocumento").validate({
    errorClass: "validacion-error",
    rules: {
      tipoDocumento: { requiredSelect: true },
      documentoValor: "required",
    },
    messages: {
      tipoDocumento: {
        required: "Por favor, seleccione el tipo de documento.",
      },
      documentoValor: {
        required: "Por favor, ingrese el valor del documento.",
      },
    },
  });
  $("#cambiarContrasenaForm").validate({
    errorClass: "validacion-error",
    rules: {
      nuevaContrasena: {
        required: true,
      },
      confirmarContrasena: {
        required: true,
        equalTo: "#nuevaContrasena",
      },
    },
    messages: {
      nuevaContrasena: {
        required: "Ingrese la nueva contraseña",
      },
      confirmarContrasena: {
        required: "Confirme la contraseña",
        equalTo: "Las contraseñas no coinciden",
      },
    },
  });

  $("#modalCambiarContrasena").dialog({
    autoOpen: true,
    modal: true,
    width: 400,
    resizable: false,
    draggable: false,
    closeOnEscape: false,
    open: function (event, ui) {
      $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
    },
  });

  $("#modulo").select2();

  $("#guardarBtn").on("click", function (e) {
    e.preventDefault();
    let moduloSeleccionado = $("#modulo").val();
    let idPerfil = $("#idPerfilxModulo").val();

    $.ajax({
      type: "POST",
      url: "procesarModulo.php",
      data: { modulo: moduloSeleccionado, idPerfil: idPerfil },
    }).then(function (response) {
      swal({
        title: "Listo!",
        text: "Los modulos sean cargado!",
        icon: "success",
        button: "Ok",
      });
    });
  });

  $("#modulo").on("select2:unselect", function (e) {
    let borrarModulo = e.params.data.id;
    let idPerfil2 = $("#idPerfilxModulo").val();

    $.ajax({
      type: "POST",
      url: "procesarEliminarModulo.php",
      data: {
        modulo: borrarModulo,
        idPerfil: idPerfil2,
      },
    }).then(function (response) {
      swal("Éxito", "El modulo se ha eliminado correctamente", "success");
    });
  });

  tinymce.init({
    selector: "textarea#mytextarea",
    plugins:
      "ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss save",
    toolbar:
      "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat | save",
    tinycomments_mode: "embedded",
    tinycomments_author: "Author name",
    save_onsavecallback: function () {
      guardarContenido();
    },
    mergetags_list: [
      { value: "First.Name", title: "First Name" },
      { value: "Email", title: "Email" },
    ],
    ai_request: (request, respondWith) =>
      respondWith.string(() =>
        Promise.reject("See docs to implement AI Assistant")
      ),
  });
  notiBaja();
  ocultarMensajes();

  $("#formularioClienteF").validate({
    errorClass: "validacion-error",
    rules: {
      nombre: "required",
      apellido: "required",
      fec_nac: {
        required: true,
        date: true,
        max: moment().subtract(18, "years").format("YYYY-MM-DD"),
      },
      sexo: { requiredSelect: true },
      esp: { requiredSelect: true },
      tipoDocumento: { requiredSelect: true },
      documentoValor: {
        required: true,
        digits: true,
      },
      tipoContacto: { requiredSelect: true },
      contactoValor: "required",
      pais: { requiredSelect: true },
      provincias: { requiredSelect: true },
      localidad: { requiredSelect: true },
      barrio: { requiredSelect: true },
      tipoDom: { requiredSelect: true },
      razonSocial: "required",
      cuit: {
        required: true,
        digits: true,
      },
      nroIngresoBruto: {
        required: true,
        digits: true,
      },
      cc: { ForCC: true },
      contactoValorJ: "required",
      tipoContactoJ: { requiredSelect: true },
      documentoValorJ: "required",
      tipoDocumentoJ: { requiredSelect: true },
      paisJ: { requiredSelect: true },
      provinciasJ: { requiredSelect: true },
      localidadJ: { requiredSelect: true },
      barrioJ: { requiredSelect: true },
      tipoDomJ: { requiredSelect: true },
    },
    messages: {
      nombre: "Por favor ingrese el nombre del cliente",
      apellido: "Por favor ingrese el apellido",
      fec_nac: {
        required: "Por favor ingrese la fecha de nacimiento",
        date: "Por favor ingrese una fecha válida",
        max: "Debes tener más de 18 años para registrarte",
      },
      sexo: "Por favor seleccione el género",
      tipoDocumento: "Por favor seleccione el tipo de documento",
      documentoValor: {
        required: "Por favor ingrese el número de documento",
        digits: "Por favor ingrese solo números",
      },
      tipoContacto: "Por favor seleeccione un tipo de contacto",
      contactoValor: "Por favor ingrese el contacto",
      pais: "Por favor seleccione el país",
      provincias: "Por favor seleccione la provincia",
      localidad: "Por favor seleccione la localidad",
      barrio: "Por favor seleccione el barrio",
      tipoDom: "Por favor seleccione el tipo de domicilio",
      razonSocial: "Por favor ingrese la razon social",
      cuit: "Por favor ingrese el cuit de la empresa",
      obraSocial: "Por favor ingrese la obra social",
      nroIngresoBruto: "Por favor ingrese el nro de ingreso Bruto",
      tipoDocumentoJ: "Por favor seleccione el tipo de documento",
      documentoValorJ: {
        required: "Por favor ingrese el número de documento",
        digits: "Por favor ingrese solo números",
      },
      tipoContactoJ: "Por favor seleeccione un tipo de contacto",
      contactoValorJ: "Por favor ingrese el contacto",
      paisJ: "Por favor seleccione el país",
      provinciasJ: "Por favor seleccione la provincia",
      localidadJ: "Por favor seleccione la localidad",
      barrioJ: "Por favor seleccione el barrio",
      tipoDomJ: "Por favor seleccione el tipo de domicilio",
    },
  });

  $.validator.addMethod(
    "requiredSelect",
    function (value, element) {
      return value != "0";
    },
    "Por favor seleccione una opción"
  );
  //Formulario de cliente juridico
  $("#formularioClienteJ").validate({
    errorClass: "validacion-error",
    rules: {
      razonSocial: "required",
      cuit: {
        required: true,
        digits: true,
      },
      nroIngresoBruto: {
        required: true,
        digits: true,
      },
      cc: { ForCC: true },
    },
    messages: {
      razonSocial: "Por favor ingrese la razon social",
      cuit: "Por favor ingrese el cuit de la empresa",
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

  $("#tabs").tabs();
  $("#tabs2").tabs();
  $("#formularioMovExp").validate({
    errorClass: "validacion-error",
    rules: {
      descripcion: "required",
      movimiento: {
        required: true,
        min: 1,
      },
      "archivo[]": {
        required: true,
        extension: "pdf|doc|docx",
      },
    },
    messages: {
      descripcion: "Por favor ingrese la descripción del movimiento",
      movimiento: {
        required: "Por favor seleccione el tipo de movimiento",
        min: "Por favor seleccione el tipo de movimiento",
      },
      "archivo[]": {
        required: "Por favor seleccione al menos un archivo",
        extension:
          "Por favor seleccione un archivo con una extensión válida (pdf, doc, docx)",
      },
    },
  });
});

//validacion de Formulario Fisico
$("#formularioExpedienteF").validate({
  errorClass: "validacion-error",
  rules: {
    nroExpediente: "required",
    caratula: "required",
    clienteF: { ForCliente: true },
    estadoExp: { ForEstado: true },
    expTipo: { ForTipo: true },
    expSubTipo: { ForSubTipo: true },
  },
  messages: {
    nroExpediente: "Por favor ingrese el nro de expediente",
    caratula: "Por favor ingree la caratula",
  },
});

$.validator.addMethod(
  "ForCliente",
  function (value, element, param) {
    return value != "0";
  },
  "Por favor seleccione el cliente"
);
$.validator.addMethod(
  "ForEstado",
  function (value, element, param) {
    return value != "0";
  },
  "Por favor seleccione el estado del expediente"
);
$.validator.addMethod(
  "ForTipo",
  function (value, element, param) {
    return value != "0";
  },
  "Por favor seleccione el tipo del expediente"
);
$.validator.addMethod(
  "ForSubTipo",
  function (value, element, param) {
    return value != "0";
  },
  "Por favor seleccione el subTipo del expediente"
);
function notiBaja() {
  let darBaja = document.querySelectorAll(".darDeBajaButton");

  darBaja.forEach((button) => {
    button.addEventListener("click", function (ev) {
      ev.preventDefault();

      let nombre = obtenerNombreDeFila(button);
      swal({
        title: "¿Estás seguro de querer borrar a " + nombre + "?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        buttons: ["Cancelar", "Sí, borrarlo"],
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          let enlace = button.closest("a");
          let url = enlace ? enlace.href : null;

          if (url) {
            window.location.href = url;
          }
        }
      });
    });
  });
}

function obtenerNombreDeFila(button) {
  let fila = button.closest("tr");

  let nombreColumna = fila.querySelector(":nth-child(2)").textContent;

  return nombreColumna;
}

$("#formularioPersona").validate({
  errorClass: "validacion-error",
  rules: {
    nombre: "required",
    apellido: "required",
    fecnac: "required",
    esp: {
      required: true,
      min: 1, // Asegúrate de que se haya seleccionado una especialización
    },
    sex: {
      required: true,
      min: 1, // Asegúrate de que se haya seleccionado un sexo
    },
  },
  messages: {
    nombre: "Por favor ingrese el nombre del abogado",
    apellido: "Por favor ingrese el apellido del abogado",
    fecnac: "Por favor ingrese la fecha de nacimiento del abogado",
    esp: {
      required: "Por favor seleccione la especialización",
      min: "Por favor seleccione la especialización",
    },
    sex: {
      required: "Por favor seleccione el sexo",
      min: "Por favor seleccione el sexo",
    },
    tipoContacto: {
      required: "Por favor seleccione el tipo de contacto",
      min: "Por favor seleccione el tipo de contacto",
    },
    contactoValor: "Por favor ingrese el valor de contacto",
    tipoDocumento: {
      required: "Por favor seleccione el tipo de documento",
      min: "Por favor seleccione el tipo de documento",
    },
    pais: {
      required: "Por favor seleccione el país",
      min: "Por favor seleccione el país",
    },
    provincias: {
      required: "Por favor seleccione la provincia",
      min: "Por favor seleccione la provincia",
    },
    localidad: {
      required: "Por favor seleccione la localidad",
      min: "Por favor seleccione la localidad",
    },
    barrio: {
      required: "Por favor seleccione el barrio",
      min: "Por favor seleccione el barrio",
    },
    tipoDom: {
      required: "Por favor seleccione el tipo de domicilio",
      min: "Por favor seleccione el tipo de domicilio",
    },
    valorAtributo: "Por favor ingrese el valor del atributo",
  },
});
$("#formularioPersonaModificar").validate({
  errorClass: "validacion-error",
  rules: {
    nombre: "required",
    apellido: "required",
    fecnac: "required",
    esp: {
      required: true,
      min: 1, // Asegúrate de que se haya seleccionado una especialización
    },
    sex: {
      required: true,
      min: 1, // Asegúrate de que se haya seleccionado un sexo
    },
  },
  messages: {
    nombre: "Por favor ingrese el nombre del abogado",
    apellido: "Por favor ingrese el apellido del abogado",
    fecnac: "Por favor ingrese la fecha de nacimiento del abogado",
    esp: {
      required: "Por favor seleccione la especialización",
      min: "Por favor seleccione la especialización",
    },
    sex: {
      required: "Por favor seleccione el sexo",
      min: "Por favor seleccione el sexo",
    },
    tipoContacto: {
      required: "Por favor seleccione el tipo de contacto",
      min: "Por favor seleccione el tipo de contacto",
    },
    contactoValor: "Por favor ingrese el valor de contacto",
    tipoDocumento: {
      required: "Por favor seleccione el tipo de documento",
      min: "Por favor seleccione el tipo de documento",
    },
    pais: {
      required: "Por favor seleccione el país",
      min: "Por favor seleccione el país",
    },
    provincias: {
      required: "Por favor seleccione la provincia",
      min: "Por favor seleccione la provincia",
    },
    localidad: {
      required: "Por favor seleccione la localidad",
      min: "Por favor seleccione la localidad",
    },
    barrio: {
      required: "Por favor seleccione el barrio",
      min: "Por favor seleccione el barrio",
    },
    tipoDom: {
      required: "Por favor seleccione el tipo de domicilio",
      min: "Por favor seleccione el tipo de domicilio",
    },
    valorAtributo: "Por favor ingrese el valor del atributo",
  },
});
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

function cargarProvincias(idPais) {
  if (idPais != 0) {
    $.post(
      "provincia.php", //archivo  del php de la url
      {
        id_pais: idPais,
      }, // paramtro que le paso (nombre de variable:variable) nombre de que lo amos a usar y el otro del jquery
      function (data) {
        provincias = JSON.parse(data); // funcion de respuesta que me va dar el servidor
        $("#provincias").empty();
        for (let i = 0; i < provincias.length; i++) {
          let option = $("<option>")
            .val(provincias[i]["id_provincia"])
            .text(provincias[i]["nombre"]);
          $("#provincias").append(option);
        }
      }
    );
  } else {
    alert("selecicone un pais");
  }
}

function cargarLocalidades(idProvincia) {
  if (idProvincia != 0) {
    $.post(
      "localidad.php",
      {
        idProvincia: idProvincia,
      },
      function (data) {
        localidades = JSON.parse(data);
        $("#localidad").empty();
        for (let i = 0; i < localidades.length; i++) {
          let option = $("<option>")
            .val(localidades[i]["id_localidad"])
            .text(localidades[i]["nombre"]);
          $("#localidad").append(option);
        }
      }
    );
  }
}
function cargarBarrios(idLocalidad) {
  if (idLocalidad != 0) {
    $.post(
      "barrio.php",
      {
        idLocalidad: idLocalidad,
      },
      function (data) {
        barrios = JSON.parse(data);
        $("#barrio").empty();
        for (let i = 0; i < barrios.length; i++) {
          let option = $("<option>")
            .val(barrios[i]["id_barrio"])
            .text(barrios[i]["nombre"]);
          $("#barrio").append(option);
        }
      }
    );
  }
}
// document.getElementById("pdfForm").addEventListener("submit", function () {
//   var filtroForm = document.getElementById("filtroForm");
//   this.action =
//     "generarReportePDF.php" +
//     "?" +
//     new URLSearchParams(new FormData(filtroForm)).toString();
// });
