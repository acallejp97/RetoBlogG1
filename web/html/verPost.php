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


    <form action="registro.php" method="POST">
        <input type="submit" value="Registrarse" name="Registrarse">
    </form>
        <?php
} else {
    ?>

		<form action="index1.php" method="POST">
			<input type="submit" value="Cerrar Sesion" name="Cerrar Sesion">
		</form>

		<form action="nuevoPost.php" method="POST">
            <input id="CrearPost" type="submit" value="Crear post" name="Crear post">
		</form>
    <?php
}
?>
    </header>

    <section class="text-left">
    <?php

echo $vista->mostrarUnicoArticulo($id_articulo);
?>
        <form action="CrearComentario.php" method="POST">
            <label>Texto</label> <textarea name="ComentarioPost" id="ComentarioPost" cols="30" rows="10"></textarea>
            <br><br>
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar" name="Limpiar">
        </form>
    </section>


    <footer>
        <a href="index1.php">Volver al inicio</a>
        <a href="#menu" class="up-button"><img src="img/menu-button.png"></a>
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
      <a href="#initSesion" class="up-button"><img src="img/menu-button.png"></a>
</body>

</html>