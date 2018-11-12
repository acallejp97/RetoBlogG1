<?php
session_start();
?>

<!DOCTYPE html>
<html lang="UTF-8">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="title" content="G1Blog">
	<title>G1Blog</title>
	<link rel="stylesheet" href="css/main.css">
	<?php
define('RAIZ_APLICACION', dirname(__FILE__));

include RAIZ_APLICACION . '/../php/Conexion/Conexion.php';
include RAIZ_APLICACION . '/../php/Controlador/UsuarioControler.php';
include RAIZ_APLICACION . '/../php/Controlador/ArticuloControler.php';
include RAIZ_APLICACION . '/../php/Controlador/ComentarioControler.php';
include_once RAIZ_APLICACION . '/../php/Controlador/usuarioDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/articuloDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/comentariosDTO.php';
include_once RAIZ_APLICACION . '/../php/Vista/Vista.php';
include_once RAIZ_APLICACION . '/../php/Modelo/ArticuloDAO.php';
$vista = new Vista();
$articuloDao = new ArticuloDAO();

if (isset($_SESSION)) {
    $vista = new Vista();
}

?>
</head>

<body>
	<article>
        <aside id="aside" onload="ocultarAside();">
            <h1>Criterio de busqueda</h1>
            <p>
                <form action="BuscarCustom.php" method="POST">
                    <label>Fecha<label><input type="date" name="fecha" />
                    <br><br>
                    <input type="submit" value="Buscar" name="Buscar">
                    <input type="reset" value="Limpiar" name="Limpiar" onclick="location='LimpiarSelectioDate.php'">
                </form>
            </p>
        </aside>
	</article>
	<?php
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
    // echo $usuario["idUsuario"] . " " . $usuario["nombre"];

}

/*if (isset($_SESSION["listaArticulos"])) {
echo "Hay lista de articulos";
}*/

?>
	<header id="initSesion">
			<?php
if (!isset($_SESSION["usuario"])) {
    ?>
				<form action="IniciarSesion.php" method="post">

				<label>Usuario :</label> <input type="text" name="usuario" />
				<label>Password :</label> <input type="password" name="password" />
				<input type="submit" value="Loguear" onclick="validarInicio()" name="Loguear">
			</form>

		<form action="registro.php" method="POST">
			<input type="submit" value="Registrarse" name="Registrarse">
		</form>
			<?php
} else {

    ?>

		<form action="nuevoPost.php" method="POST">
			<input id="CrearPost" type="submit" value="Crear post" name="Crear post">
		</form>
		<form action="logout.php" method="POST">
			<input id="Logout" type="submit" value="Logout" name="Logout">
		</form>
	<?php
}
?>
	</header>

	<section>
		<?php
$listadoArticulos = [];
if (isset($_SESSION["listaArticulos"])) {
    $listaArticulos = $_SESSION["listaArticulos"];
    foreach ($listaArticulos as $articulo) {
        $articulo1 = $articuloDao->trasformObjetcDto($articulo);
        // echo $articulo1->toString();
        array_push($listadoArticulos, $articulo1);
    }
    echo $vista->mostrarContenido($listadoArticulos);
} else {
    echo $vista->mostrarContenido("");
}
?>

	</section>
	<script>

		if(readCookie("usuario")==null){
		document.getElementsByClassName("btn-link").disabled=true;
		}else{
		document.getElementsByClassName("btn-link").disabled=false;
		}
		
		function validarInicio() {
			var usuario = document.getElementById("usuario").value;
			var passwd = document.getElementById("password").value;

			if (passwd == "?" && usuario == "?") {
				return true;
			} else {
				return console.log(false);
			}
		}

		function ocultarAside(){
			document.getElementById("aside").style.visibility="hidden";
		}

		function readCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}



	</script>

	<footer>
		<a href="about.html">About</a>
	</footer>
</body>

</html>