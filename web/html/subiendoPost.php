<?php
session_start();
define('RAIZ_APLICACION', dirname(__FILE__));

include RAIZ_APLICACION . "/../php/Controlador/articuloDTO.php";
include RAIZ_APLICACION . "/../php/Controlador/ArticuloControler.php";

$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$publicado = $_POST["publicado"];
$date = date('Y/m/d', time());

$articuloDto = new articuloDTO();
$articuloControl = new articuloControler();
$articuloDto = $articuloControl->guardarArticulo($date, $texto, 1, 0, 1, $publicado, $titulo);
$message = "Post añadido";
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: http://localhost/Proyectos/Clase/Retos/RetoBlogG1/web/html/index1.php");
