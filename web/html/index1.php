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
$vista=new Vista();
$articuloDao=new ArticuloDAO();  
?>
</head>

<body>
    <article>
        <aside>
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
	
	<header id="initSesion">
            <form action="IniciarSesion.php" method="post">
			<label>Usuario :</label> <input type="text" name="usuario" />
			<label>Password :</label> <input type="password" name="password" />
			<input type="submit" value="Loguear" onclick="validarInicio()" name="Loguear">
		</form>

		<form action="registro.html" method="POST">
			<input type="submit" value="Registrarse" name="Registrarse">
		</form>

		<form action="nuevoPost.html" method="POST">
			<input id="CrearPost" type="submit" value="Crear post" name="Crear post">
		</form>

	</header>

	<section>
		<?php
                $listadoArticulos=[];
                 if(isset($_SESSION["listaArticulos"]))
                    {
                          $listaArticulos=$_SESSION["listaArticulos"];
                          foreach ($listaArticulos as $articulo)
                          {
                              $articulo1=$articuloDao->trasformObjetcDto($articulo);
                            // echo $articulo1->toString();
                              array_push($listadoArticulos,$articulo1);
                          }
                        echo $vista->mostrarContenido($listadoArticulos);
                    }
                   else {
			echo $vista->mostrarContenido("");
                   }
		?>

	</section>
	<script>
		document.getElementById("CrearPost").style.visibility = "hidden";
		function validarInicio() {
			var usuario = document.getElementById("usuario").value;
			var passwd = document.getElementById("password").value;

			if (passwd == "?" && usuario == "?") {
				return true;
			} else {
				return console.log(false);
			}
		}
	</script>
	<footer>
		<a href="about.html">About</a>
	</footer>
</body>

</html>