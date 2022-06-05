const btnsEliminar = document.querySelectorAll('#eliminar');

document.addEventListener('DOMContentLoaded', function() {
    eliminar();
});

// ELIMINAR
function eliminar() {
    // console.log(btnsEliminar);
    btnsEliminar.forEach(btnEliminar => {
        btnEliminar.addEventListener('click', (e) => {
            e.preventDefault();
            const id =  e.target.dataset.id;
            // console.log(id); 
            confirmarEliminar(id); 
        });
    });
}

function confirmarEliminar(id) {
    Swal.fire({
        title: '¿Seguro que lo desea eliminar este infante?',
        text: "No podras revertir esta accion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Eliminado!',
                'Infante ha sido eliminado',
                'success'
            )
            confirmar_dos(id)
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    })
}



async function confirmar_dos(id) {
    // console.log(id);
    const datos = new FormData();
    datos.append('id', id);
    try {
        const url = "http://localhost:3000/infantes/eliminar";
        const respuesta = await fetch(url, {
            method: 'POST',
            // body cuerpo de la peticion
            body: datos
        });
        const resultado = await respuesta.json();
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Infante no puede ser cancelada',
            // footer: '<a href="">Why do I have this issue?</a>'
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    }
}