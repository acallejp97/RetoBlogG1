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

include RAIZ_APLICACION . "/../php/Conexion/Conexion.php";
include RAIZ_APLICACION . "/../php/Modelo/UsuarioControler.php";
include RAIZ_APLICACION . "/../php/Modelo/ArticuloDAO.php";
include_once RAIZ_APLICACION . "/../php/Modelo/UsuarioDAO.php";
include RAIZ_APLICACION . "/../php/Controlador/ArticuloControler.php";
include_once RAIZ_APLICACION . "/../php/Controlador/articuloDTO.php";

/* Pruebas con la tabla de Articulos */
$usuarioDao = new UsuarioDAO();
$articuloControler = new ArticuloControler();

$listaUsuarios = $usuarioDao->selectLogin("admin", "admin");
$usuario = new usuariosDTO();
foreach ($listaUsuarios as $usuario) {
    echo $usuario->toString();
    $usuario = new usuariosDTO();
}
?>
    </body>
</html>
