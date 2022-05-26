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
// function fechaCita(){
//     const e=document.querySelector("#fecha");
//     e.addEventListener("input",t=>{
//         const n=new Date(t.target.value).getUTCDay();
//         [0,6].includes(n)?(t.preventDefault(),e.value="",mostrarAlerta("Fines de Semana no son permitidos","error"))})}
botones();