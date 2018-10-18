function validacionPost(post) {
  if (post == "") {
    alert("El post no puede estar vacio");
    return false;
  } else return true;
}

function validarFechaProgramada(fecha) {
  var fechaHoy = new Date();
  fechaHoy.setHours(0, 0, 0, 0);
  if (fechaHoy <= fecha) {
    alert("La fecha introducida no es valida");
    return false;
  } else return true;
}

