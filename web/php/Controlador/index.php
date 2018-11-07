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
            
include RAIZ_APLICACION . '/../php/Conexion/Conexion.php';
include RAIZ_APLICACION . '/../php/Controlador/UsuarioControler.php';
include RAIZ_APLICACION . '/../php/Controlador/ArticuloControler.php';
include RAIZ_APLICACION . '/../php/Controlador/ComentarioControler.php';
include_once RAIZ_APLICACION . '/../php/Controlador/usuarioDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/articuloDTO.php';
include_once RAIZ_APLICACION . '/../php/Controlador/comentariosDTO.php';
include_once RAIZ_APLICACION . '/../php/Vista/Vista.php';

            /*Pruebas con Comentarios*/
            $comentarioCont=new ComentarioControler();
            
            $listaComentarios=$comentarioCont->buscarComentarioPorID(3, 1);
            
            echo $listaComentarios->toString();
            
          
	?>
    </body>
</html>
