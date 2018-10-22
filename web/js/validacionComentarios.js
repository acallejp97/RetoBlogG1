//Funcion que detecta si el texto introducido es correcto
function validacionTexto(texto) {
  texto=texto.element[""];
  if (texto.value == "") {
    alert("El " + texto.name + " no puede estar vacio");
    return false;
  } else return true;
}