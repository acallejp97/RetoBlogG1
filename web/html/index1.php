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
		include '../php/Conexion/Conexion.php';
		include '../php/Controlador/UsuarioControler.php';
		include '../php/Controlador/ArticuloControler.php';
		include '../php/Controlador/ComentarioControler.php';
	 	include_once '../php/Controlador/usuarioDTO.php';
		include_once '../php/Controlador/articuloDTO.php';
		include_once '../php/Controlador/comentariosDTO.php';
		include_once '../php/Vista/Vista.php';
        $listaArti=1;  
        $usuariodto=1;
        
	?>
</head>

<body>
    <?php
    $vista=new Vista();
    if(!isset($_SESSION))
            {  
                $vista=new Vista();
                $_SESSION["listaArticulos"]=[]; //Creamos un array para luego guardar una lista de articulos
                $_SESSION["usuario"]=""; //Creamos una 
            }
            else
            {
                if(isset($_SESSION["usuario"]))
                {
                	echo "estoy dentro de la s esion";
                    $usuario=new usuarioDTO();
                    $usuario=$_SESSION["usuario"];    
                    echo json_encode($usuario);
                    //echo $usuario->toString();
                }
            }
    ?>
    <article>
        <aside>
            <h1>Criterio de busqueda</h1>
            <p>
                <form action="BuscarCustom.php" method="POST">
                    <label>Fecha<label><input type="date" name="fecha" />
                    <br><br>
                    <input type="submit" value="Buscar" name="Buscar">
                    <input type="reset" value="Limpiar" name="Limpiar">
                </form>
            </p>
        </aside>
	</article>
	
	<header id="initSesion">
            <form action="IniciarSesion.php" method="post">
          <!--  <form action="/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Vista/IniciarSesion.php" method="post">-->
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
			echo $vista->mostrarContenido(1);
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