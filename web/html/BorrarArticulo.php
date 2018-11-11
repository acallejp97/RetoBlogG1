<?php 
session_start();
include_once RAIZ_APLICACION . '/../php/Controlador/ArticuloControler.php';

$articuloCont=new ArticuloControler();
$idArticulo=$_POST["idArticulo"];
$articuloCont->borrarArticulo($idArticulo);
header('Location: index1.php');
?>