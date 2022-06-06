let horario = '';
const cita = {
    id: '',
    id_tutor:'',
    id_infante:'',
    id_horario: '',
    fecha: ''
}
document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    idTutor();
    idInfante();
    seleccionarHora();
    seleccionarFecha();
    guardar();
}

//await hace un tiempo de espera para que realize la petición
function idInfante() {
    const idInfante = document.querySelector('#id_infante');
    cita.id_infante=idInfante.value;
    idInfante.addEventListener('input', (e) => {
        cita.id_infante = e.target.value;
        // console.log(cita);
    });
}

function idTutor() {
    const idTutor = document.querySelector('#id_tutor').value;
    cita.id_tutor = idTutor;
}
function seleccionarHora() {
    const inputHora = document.querySelector('#id_horario');
    cita.id_horario=inputHora.value;
    
    inputHora.addEventListener('input', (e) => {
        cita.id_horario = e.target.value;
        // console.log(cita);
    });
}

function seleccionarFecha() {
    const inputFecha = document.querySelector('#fecha');
    cita.fecha=inputFecha.value;
    inputFecha.addEventListener('input', (e) => {
        const dia = new Date(e.target.value).getUTCDay();
        // 0 es domingo,1 lunes,2 martes... 6 sabado
        if ([6, 0].includes(dia)) {
            e.target.value = '';
            mostrarAlerta('Fines de semana no abrimos', 'error', '.formulario');
        } else {
            cita.fecha = e.target.value;
            // console.log(cita);
        }
    });
}



function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {
    // Si ya existe una alerta
    const alertaAnterior = document.querySelector('.alerta');
    if (alertaAnterior) {
        alertaAnterior.remove();
    };
    const alerta = document.createElement('DIV');
    const mensajeAlerta = document.createElement('P');
    mensajeAlerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);
    alerta.appendChild(mensajeAlerta);
    const formulario = document.querySelector(elemento);
    formulario.appendChild(alerta);
    if (desaparece) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }

}
function guardar() {
    const btnGuardar = document.querySelector('#guardar');
    btnGuardar.addEventListener('click', (e) => {
        e.preventDefault();
        console.log(cita);
        reservarCita();
    });
}
// 
async function reservarCita() {
    const {id_tutor,id_infante, id_horario,fecha} = cita;
    const datos = new FormData();
    // datos.append('id', id);
    datos.append('id_tutor', id_tutor);
    datos.append('id_infante', id_infante);
    datos.append('id_horario', id_horario);
    datos.append('fecha', fecha);
    datos.append('asistir', '0');
    datos.append('cancelo', '0');
    try {
        const url = "http://localhost:3000/api/citas";
        const respuesta = await fetch(url, {
            method: 'POST',
            // body cuerpo de la peticion
            body: datos
        });
        const resultado = await respuesta.json();
        // console.log(resultado.resultado);
        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Cita registrada',
                text: 'Tu cita fue registrada correctamente',
                // footer: '<a href="">Why do I have this issue?</a>'
                button: 'OK'
                // footer: '<a href="/inicio">OK</a>'
            }).then(() => {
                setTimeout(() => {
                    window.location.reload();
                    window.location.href = "http://localhost:3000/inicio";
                }, 500);
            })
        };
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Tu cita no fue registrada',
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        })
    }
}