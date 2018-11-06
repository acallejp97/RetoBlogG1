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
