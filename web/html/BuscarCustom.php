<?php
session_start();
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/ArticuloControler.php';
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/articuloDTO.php';
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Conexion/Conexion.php';
//include 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\ArticuloControler.php';
//include 'C:\wamp64\www\RetoBlogG1\web\php\Conexion\Conexion.php';
$fecha=$_POST["fecha"];
$articuloControl=new ArticuloControler();
$listaArticulos=$articuloControl->buscarPorFecha($fecha);
//$_SESSION["listaArticulos"]=$listaArticulos;

header('http://cadenaser.com/');
?>
<html>
    <head>
        <title>HOla</title>
    </head>
    <body>
        <?php
        $articulo=new articuloDTO();
        foreach($listaArticulos as $articulo)
            {
                $articulo->toString();
                $articulo=new articuloDTO();
            }
        ?>
    </body>
</html>
