// const openModal = document.querySelector('.openModal');
// const modal = document.querySelector('.modal');
// const closeModal = document.querySelector('.modal_close');

// openModal.addEventListener('click', (e)=>{
//     e.preventDefault();
//     modal.classList.add('modal--show');
// });

// closeModal.addEventListener('click', (e)=>{
//     e.preventDefault();
//     modal.classList.remove('modal--show');
// });
window.onload = notiBaja();

function notiBaja() {
  let darBaja = document.getElementsByClassName("darDeBajaButton");

  for (let i = 0; i < darBaja.length; i++) {
    darBaja[i].addEventListener("click", (ev) => {
      let ventanaconfir = confirm("¿Estas seguro de querer borrar?");
      if (ventanaconfir) {
        href = darBaja[i].getAttribute("href");
        alert(href);
      } else {
        ev.preventDefault();
        return;
      }
    });
  }
}
function validar() {
  let inputName = document.getElementById("nombre").value;
  if (inputName.length == 0 || inputName.trim() == "") {
    alert("Campo vacio");
    return;
  } else {
    document.getElementById("form-sex").submit();
  }
}
