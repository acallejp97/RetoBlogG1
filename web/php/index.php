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
            include "./Controlador/ArticuloControler.php";
	    include_once "./Controlador/articuloDTO.php";

            /* Pruebas con la tabla de Articulos */
            $articuloControler=new ArticuloControler();
            $articuloDao=new ArticuloDAO();           
            $conectar->cerrar();
	?>
    </body>
</html>
