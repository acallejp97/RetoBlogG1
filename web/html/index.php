<!DOCTYPE html>
<html lang="UTF-8">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="title" content="Ultimatix">
	<meta name="description" content="Grupo 1 de DAW 2.">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<title>Ultimatix</title>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">
	<?php include '../php/Conexion/Conexion.php';?>

</head>

<body>
	<header>
		<form action="nose.php" method="POST">
			Usuario : <input type="text" id="usuario"/>
			Password : <input type="password" id="password"/>
			<input type="button" value="Loguear" onclick="validarInicio(this)" name="Loguear">
		</form>
		<form action="registro.html" method="POST">
			<input type="submit" value="Registrarse" name="Registrarse">
		</form>
		<form action="interfazUsuario.html" method="POST">
			<input type="submit" value="Crear post" name="Crear post">
		</form>
	</header>
	<!--
	<section>
		"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
		occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
	</section>
-->
	<footer>
		<a href="about.html">About</a>
</footer>
				<script>
				function validarInicio(todo) {
				  var usuario = document.getElementById("usuario").value;
				  var passwd = document.getElementById("password").value;
<?php
include '../php/Modelo/UsuarioDAO.php';
 $this->selectAll();
?>
				  if (passwd == "?" && usuario == "?") return true;
				  else return console.log(false);
				}
				</script>
</body>

</html>