document.addEventListener('DOMContentLoaded', function() {
    MenuDesplegable();
    botones();
});
//FIXME: .hero era la clase
const hero = document.querySelector('.menu__hidden');
const body = document.querySelector('body');
const btnPadre = document.querySelector('.eleccion_padre');
const btnHijo = document.querySelector('.eleccion_hijo');


function botones() {
    btnPadre.onclick = function() {
        document.location.href = "/materia-de-apoyo-tutor";
        console.log('click en btn padre')
    }
    btnHijo.onclick = function() {
        document.location.href = "/materia-de-apoyo-infante";
        console.log('click en btn hijo')
    }
}


function MenuDesplegable() {
    const menu = document.querySelector('.menu');
    const divMenuDeslizable = document.createElement('DIV');
    menu.onclick = function() {
        if (body.classList.contains('fijarbody')) {
            limpiarBotones();
            return;
        }

        divMenuDeslizable.classList.add('contenedor-menu');
        const opcion = document.createElement('A');
        const opcion1 = document.createElement('A');
        const opcion2 = document.createElement('A');
        const opcion3 = document.createElement('A');

        opcion.href = "/";
        opcion1.href = "/conocenos";
        opcion2.href = "/materia-de-apoyo-mv";
        opcion3.href = "/login";

        opcion.innerHTML = '<i class="fa-solid fa-house"></i>Inicio';
        opcion1.innerHTML = '<i class="fa-solid fa-magnifying-glass"></i>Conócenos';
        opcion2.innerHTML = '<i class="fa-solid fa-book-open"></i>Material de apoyo';
        opcion3.innerHTML = '<i class="fa-solid fa-user"></i>Registrarse';

        divMenuDeslizable.appendChild(opcion);
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