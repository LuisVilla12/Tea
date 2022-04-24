document.addEventListener('DOMContentLoaded', function() {
    selectValue();
});
const categoriaEnlaces = document.querySelectorAll('.cat1__enlace');
const categoriaVideos = document.querySelectorAll('.cat2__video');
const categoriaDocumentos = document.querySelectorAll('.cat3__documento');

const selectCategoriaP = document.querySelector('.MenuCategoriaMovil');

function selectValue() {
    selectCategoriaP.addEventListener('change', () => {
        var opcion = selectCategoriaP.value;
        console.log(opcion);
        if (opcion == 1) {
            categoriaEnlaces.forEach(function(ce) {
                ce.classList.add('visible');
            });
            categoriaVideos.forEach(function(cv) {
                cv.classList.remove('visible');
            });
            categoriaDocumentos.forEach(function(cd) {
                cd.classList.remove('visible');
            });
        } else if (opcion == 2) {
            categoriaEnlaces.forEach(function(ce) {
                ce.classList.remove('visible');
            });
            categoriaVideos.forEach(function(cv) {
                cv.classList.add('visible');
            });
            categoriaDocumentos.forEach(function(cd) {
                cd.classList.remove('visible');
            });
        } else {
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
    });
}