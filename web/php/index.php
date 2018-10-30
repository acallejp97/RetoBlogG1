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
            include_once "./Modelo/UsuarioDAO.php";
            include "./Controlador/ArticuloControler.php";
	        include_once "./Controlador/articuloDTO.php";
            include_once "./Controlador/usuarioDTO.php";
            /* Pruebas con la tabla de Articulos */
            $articuloControler=new ArticuloControler();
            $articuloDao=new ArticuloDAO();           
            $usuarioDao= new UsuarioDAO();

            $usuarioDto=new usuarioDTO();

            $usuarioDto=$usuarioDao->selectByNAMEPWD("Victor", "es el mejor");
            echo $usuarioDto->toString();
	?>
    </body>
</html>
