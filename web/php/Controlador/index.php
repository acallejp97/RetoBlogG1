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
define('RAIZ_APLICACION', dirname(__FILE__));

include RAIZ_APLICACION . "/Conexion/Conexion.php";
include RAIZ_APLICACION . "/Modelo/UsuarioControler.php";
include RAIZ_APLICACION . "/Modelo/ArticuloDAO.php";
include_once RAIZ_APLICACION . "/Modelo/ComentarioDAO.php";
include_once RAIZ_APLICACION . "/Controlador/comentariosDTO.php";
include_once RAIZ_APLICACION . "/Controlador/ComentarioControler.php";

/*Pruebas con Comentarios*/
$comentarioCont = new ComentarioControler();

$listaComentarios = $comentarioCont->buscarComentarioPorID(3, 1);

echo $listaComentarios->toString();

?>
    </body>
</html>
