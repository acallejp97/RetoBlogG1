<<<<<<< HEAD
//Funcion que detecta si se ha escrito algo dentro de un input
function validacionTexto(texto) {
  texto = texto.getElementById("").value;
  if (texto.value == "") {
    alert("El " + texto.name + " no puede estar vacio");
    return false;
  } else return true;
}

//Validamos si la fecha introducida es anterior al dia de hoy
function validarFechaProgramada(fecha) {
  var fechaHoy = new Date();
  var validar= true;
  if (fechaHoy <= fecha.getElementById("").value) {
    alert("La fecha introducida no es valida");
    validar=false;
  }
  return validar;
}

function formatearFecha(fecha) {
  var dividirFecha = fecha.getElementById("").value.split("/");
  var fechaModificada =
    dividirFecha(2) + "/" + dividirFecha(1) + "/" + dividirFecha(0);
    return fechaModificada;
}
=======
//Funcion que detecta si se ha escrito algo dentro de un input
function validacionTexto(texto) {
  texto = texto.getElementById("").value;
  if (texto.value == "") {
    alert("El " + texto.name + " no puede estar vacio");
    return false;
  } else return true;
}

//Validamos si la fecha introducida es anterior al dia de hoy
function validarFechaProgramada(fecha) {
  var fechaHoy = new Date();
  var validar = true;
  if (fechaHoy <= fecha.getElementById("").value) {
    alert("La fecha introducida no es valida");
    validar = false;
  }
  return validar;
}

function formatearFecha(fecha) {
  var dividirFecha = fecha.getElementById("").value.split("/");
  var fechaModificada =
    dividirFecha(2) + "/" + dividirFecha(1) + "/" + dividirFecha(0);
  return fechaModificada;
}
>>>>>>> fa2f82abc23e0a20d81c2adc9cc2c5c22d011022
