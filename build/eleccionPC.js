document.addEventListener('DOMContentLoaded', function() {
    botones();
});
const btnPadrePC = document.querySelector('.eleccionPC_padre');
const btnHijoPC = document.querySelector('.eleccionPC_hijo');
// Contenedores generales
const contenedorPadrePC = document.querySelector('.tutores');
const contenedorHijoPC = document.querySelector('.infantes');
// botones de categorias
const btnEnlaces = document.querySelector('.enlaces');
const btnVideos = document.querySelector('.videos');
const btnDocumentos = document.querySelector('.documentos');
// contenedores de categorias
const categoriaEnlaces = document.querySelectorAll('.cat1__enlace');
const categoriaVideos = document.querySelectorAll('.cat2__video');
const categoriaDocumentos = document.querySelectorAll('.cat3__documento');

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
        btnEnlaces.classList.add('material__clasificacion__boton-activo');
        btnVideos.classList.remove('material__clasificacion__boton-activo');
        btnDocumentos.classList.remove('material__clasificacion__boton-activo');

        categoriaEnlaces.forEach(function(ce) {
            ce.classList.add('visible');
        });
        categoriaVideos.forEach(function(cv) {
            cv.classList.remove('visible');
        });
        categoriaDocumentos.forEach(function(cd) {
            cd.classList.remove('visible');
        });

    }
    btnVideos.onclick = function() {
        btnEnlaces.classList.remove('material__clasificacion__boton-activo');
        btnVideos.classList.add('material__clasificacion__boton-activo');
        btnDocumentos.classList.remove('material__clasificacion__boton-activo');
        categoriaEnlaces.forEach(function(ce) {
            ce.classList.remove('visible');
        });
        categoriaVideos.forEach(function(cv) {
            cv.classList.add('visible');
        });
        categoriaDocumentos.forEach(function(cd) {
            cd.classList.remove('visible');
        });
    }
    btnDocumentos.onclick = function() {
        btnEnlaces.classList.remove('material__clasificacion__boton-activo');
        btnVideos.classList.remove('material__clasificacion__boton-activo');
        btnDocumentos.classList.add('material__clasificacion__boton-activo');
        categoriaEnlaces.forEach(function(ce) {
            ce.classList.remove('visible');
        });
        categoriaVideos.forEach(function(cv) {
            cv.classList.remove('visible');
        });
        categoriaDocumentos.forEach(function(cd) {
            cd.classList.add('visible');
        });
    }
}