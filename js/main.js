window.onload = function () {
  notiBaja();
  ocultarMensajes(); // Agregamos la función ocultarMensajes
};

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
