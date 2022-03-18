document.addEventListener('DOMContentLoaded', function() {
    botones();
});
const btnPadrePC = document.querySelector('.eleccionPC_padre');
const btnHijoPC = document.querySelector('.eleccionPC_hijo');

const contenedorPadrePC = document.querySelector('.tutores');
const contenedorHijoPC = document.querySelector('.infantes');

function botones() {
    btnPadrePC.onclick = function() {
        contenedorPadrePC.classList.add('visible');
        contenedorHijoPC.classList.remove('visible');
    }
    btnHijoPC.onclick = function() {
        contenedorPadrePC.classList.remove('visible');
        contenedorHijoPC.classList.add('visible');
    }
}