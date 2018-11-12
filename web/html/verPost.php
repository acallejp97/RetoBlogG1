<?php
$id_articulo = $_POST["id_post"];

define('RAIZ_APLICACION', dirname(__FILE__));
include_once RAIZ_APLICACION . '/../php/Modelo/ArticuloDAO.php';
include_once RAIZ_APLICACION . '/../php/Vista/Vista.php';

$articuloDAO = new articuloDAO();
$vista = new Vista();

?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="title" content="G1Blog">
    <title>G1Blog</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
</article>
	<?php
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
    //echo $usuario["idUsuario"] . " " . $usuario["nombre"];
}

if (isset($_SESSION["listaArticulos"])) {
    echo "Hay lista de articulos";
}

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
    <?php
}
?>
    </header>

    <section>
    <?php

echo $vista->mostrarUnicoArticulo($id_articulo);
?>
        <form action="nose.php" method="POST">
            Texto <textarea name="ComentarioPost" id="ComentarioPost" cols="30" rows="10"></textarea>
            <br><br>
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar" name="Limpiar">
        </form>
    </section>


    <footer>
        <a href="index.html">Volver al inicio</a>
    </footer>
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
</body>

</html>