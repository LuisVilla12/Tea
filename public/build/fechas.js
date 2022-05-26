const inputFecha = document.querySelector('#fecha');
n = new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
if (m < 10) {
    m = "0" + m
}
//Día
d = n.getDate();
if (d < 10) {
    d = "0" + d
}

// console.log(d + "/" + m + "/" + y);
// console.log(inputFecha);
inputFecha.value = y + "-" + m + "-" + d;