<?php
session_start();
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1L/web/php/Controlador/ArticuloControler.php';
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1L/web/php/Controlador/articuloDTO.php';
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1L/web/php/Conexion/Conexion.php';
/*include 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\ArticuloControler.php';
include 'C:\wamp64\www\RetoBlogG1\web\php\Conexion\Conexion.php';*/

$fecha=$_POST["fecha"];
echo "La fecha es: ".$fecha;
$articuloControl= new ArticuloControler();
$listaArticulos=$articuloControl->buscarPorFecha($fecha);
$_SESSION["listaArticulos"]=$listaArticulos;
foreach($listaArticulos as $articulo)
{
    echo $articulo->toString();
}
//header('Location: index1.php');
?>

