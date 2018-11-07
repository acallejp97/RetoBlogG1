<?php
session_start();
define('RAIZ_APLICACION', dirname(__FILE__));

include_once RAIZ_APLICACION . '../php/Controlador/ArticuloControler.php';
include_once RAIZ_APLICACION . '../php/Controlador/articuloDTO.php';
include_once RAIZ_APLICACION . '../php/Conexion/Conexion.php';

$fecha = $_POST["fecha"];
$articuloControl = new ArticuloControler();
$listaArticulos = $articuloControl->buscarPorFecha($fecha);
//$_SESSION["listaArticulos"]=$listaArticulos;

header('http://cadenaser.com/');
?>
<html>
    <head>
        <title>HOla</title>
    </head>
    <body>
        <?php
$articulo = new articuloDTO();
foreach ($listaArticulos as $articulo) {
    $articulo->toString();
    $articulo = new articuloDTO();
}
?>
    </body>
</html>
