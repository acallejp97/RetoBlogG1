<!DOCTYPE html>
<html lang="UTF-8">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="title" content="G1Blog">
	<title>G1Blog</title>
	<link rel="stylesheet" href="css/main.css">
	<?php include '../php/Conexion/Conexion.php';?>
</head>

<body>
    <article>
        <aside>
            <h1>Criterio de busqueda</h1>
            <p>
                <form action="nose.php" method="POST">
                    Fecha<input type="date" id="fecha" />
                    <br><br>
                    <input type="submit" value="Buscar" name="Buscar">
                    <input type="reset" value="Limpiar" name="Limpiar">
                </form>
            </p>
        </aside>
	</article>
	
	<header id="logueo">
		<form action="../php/Modelo/UsuarioDAO" method="POST">

			Usuario : <input type="text" id="usuario" />
			Password : <input type="password" id="password" />

			<input type="button" value="Loguear" onclick="validarInicio()" name="Loguear">
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
$link = new PDO('mysql:host=localhost;dbname=G1Blog', 'root', ''); // el campo vaciío es para la password.

?>
		<table>
			<?php foreach ($link->query('SELECT * from articulos') as $row) { // aca puedes hacer la consulta e iterarla con each. ?>
			<tr>
				<td>
					<?php echo $row['titulo']// aca te faltaba poner los echo para que se muestre el valor de la variable.            ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $row['fecha'] ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $row['texto'] ?>
				</td>
			</tr>
			<!--Lo siguiente es para dar espacio entre las lineas-->
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<?php
}
?>
		</table>

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