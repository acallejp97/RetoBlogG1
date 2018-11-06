<!DOCTYPE html>
<!--
Crear define('BASE_PATH', 'c:\projects\myapp');
include (BASE_PATH . '/config/config.php');
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
include "./Conexion/Conexion.php";
include "./Modelo/UsuarioControler.php";
include "./Modelo/ArticuloDAO.php";
include_once "./Modelo/ComentarioDAO.php";
include_once "./Controlador/comentariosDTO.php";
include_once "./Controlador/ComentarioControler.php";

/*Pruebas con Comentarios*/
$comentarioCont = new ComentarioControler();

$listaComentarios = $comentarioCont->buscarComentarioPorID(3, 1);

echo $listaComentarios->toString();

?>
    </body>
</html>
