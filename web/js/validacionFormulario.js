//Funcion que detecta si se ha escrito algo dentro de un input
function validacionTexto(texto) {
  if (texto.value == "") {
    alert("El "+texto.name+" no puede estar vacio");
    return false;
  } else return true;
}

//Validamos si la fecha introducida es anterior al dia de hoy
function validarFechaProgramada(fecha) {
  var fechaHoy = new Date();
  if (fechaHoy <= fecha) {
    alert("La fecha introducida no es valida");
    return false;
  } else return true;
}