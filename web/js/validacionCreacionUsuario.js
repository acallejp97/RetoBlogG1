//Validacion de correo
function validarCorreo(correo) {
  var expReg = /^(([^<>()[].,;:s@"]+(.[^<>()[].,;:s@"]+)*)|(".+"))@(([^<>()[].,;:s@"]+.)+[^<>()[].,;:s@"]{2,})$/;
  if (expReg.test(correo)) return true;
  else {
    alert("Por favor introduzca un correo en formato valido");
    return false;
  }
}

//Validacion Correo Creado
function validarCreacion(correoIntroducido, arrayCorreos) {
  var existe = false;
  arrayCorreos.forEach(function(correo) {
    if (correo.toUpperCase() == correoIntroducido.toUpperCase()) existe = true;
  });
  return existe;
}

//Validacion contraseña
function validarPasswd(passwd) {
  var expReg = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
  if (expReg.test(passwd)) {
    return true;
  } else {
    alert(
      "Por favor introduzca una contraseña que contenga mayuscula, minscula y un numero"
    );
    return false;
  }
}

//todo añadirlo al onclick
function onClickPulsado(usuario) {
  if (
    validarPasswd(usuario.passwd) ||
    validarCorreo(usuario.correo) ||
    validarCreacion(usuario.correo)
  )
    return true;
  else return false;
}

//Creamos el objeto usuario
var usuario = {
  id: "",
  nombre: "",
  passwd: "",
  email: "",
  permisos: ""
};

var usuario = new Object();
usuario.id = "";
usuario.nombre = "";
usuario.passwd = "";
usuario.email = "";
usuario.persmisos = "";
usuario.getID=function(){
  return this.id;
}