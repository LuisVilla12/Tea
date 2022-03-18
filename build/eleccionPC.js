document.addEventListener('DOMContentLoaded', function() {
    botones();
});
const btnPadrePC = document.querySelector('.eleccionPC_padre');
const btnHijoPC = document.querySelector('.eleccionPC_hijo');

const contenedorPadrePC = document.querySelector('.tutores');
const contenedorHijoPC = document.querySelector('.infantes');

const btnEnlaces = document.querySelector('.enlaces');
const btnVideos = document.querySelector('.videos');
const btnDocumentos = document.querySelector('.documentos');




function botones() {
    btnPadrePC.onclick = function() {
        contenedorPadrePC.classList.add('visible');
        btnPadrePC.classList.add('activo');
        contenedorHijoPC.classList.remove('visible');
        btnHijoPC.classList.remove('activo');
    }
    btnHijoPC.onclick = function() {
        contenedorPadrePC.classList.remove('visible');
        contenedorHijoPC.classList.add('visible');
        btnPadrePC.classList.remove('activo');
        btnHijoPC.classList.add('activo');
    }
    btnEnlaces.onclick = function() {

        console.log('enlaces')
    }
    btnVideos.onclick = function() {

        console.log('videos')
    }
    btnDocumentos.onclick = function() {

        console.log('documentos')
    }
}