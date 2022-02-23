document.addEventListener('DOMContentLoaded', function() {
    MenuDesplegable();
});
const hero = document.querySelector('.hero');
const body = document.querySelector('body');

function MenuDesplegable() {
    const menu = document.querySelector('.menu');
    const divMenuDeslizable = document.createElement('DIV');

    menu.onclick = function() {
        if (body.classList.contains('fijarbody')) {
            limpiarBotones();
            return;
        }

        divMenuDeslizable.classList.add('contenedor-menu');
        const opcion1 = document.createElement('A');
        const opcion2 = document.createElement('A');
        const opcion3 = document.createElement('A');

        opcion1.href = "conocenos.html";
        opcion2.href = "material.html";
        opcion3.href = "Registrarse.html";


        opcion1.innerHTML = '<i class="fa-solid fa-magnifying-glass"></i>Conocenos';
        opcion2.innerHTML = '<i class="fa-solid fa-book-open"></i>Material de apoyo';
        opcion3.innerHTML = '<i class="fa-solid fa-user"></i>Registrarse';

        divMenuDeslizable.appendChild(opcion1);
        divMenuDeslizable.appendChild(opcion2);
        divMenuDeslizable.appendChild(opcion3);

        hero.appendChild(divMenuDeslizable);
        body.classList.add('fijarbody');

    }
    divMenuDeslizable.onclick = function() {
        limpiarBotones();
    }
}

function limpiarBotones() {
    const divMenuDeslizable = document.querySelector('.contenedor-menu');
    const enlaces = document.querySelectorAll('.contenedor-menu a');
    // quitar la clase de fijar body
    body.classList.remove('fijarbody');
    // seleccionar y eliminar todos los enlaces del menu
    enlaces.forEach(enlace => {
        divMenuDeslizable.removeChild(enlace);
    });
    // quitar el overlay del menu
    hero.removeChild(divMenuDeslizable);
}