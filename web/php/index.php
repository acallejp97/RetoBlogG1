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

            
            /*Pruebas con Comentarios*/
            $comentarioDao= new ComentarioDAO();
            $temp=[];
           
            //$id,$texto,$fecha,$idArticulo,$idUsuario
            $temp=$comentarioDao->update(1,"¿Es un pajaro?, ¿Es un avión?. ¡NO! es SuperLopez", '2018-11-15',1,1);
            if($temp>0)
            {
                echo "<p>Registro actualizado con exito</p>";
            }
            else
            {
                echo "<p>NO se ha podido actualizar el registro</p>";
            }
            $comentario=new comentariosDTO();       
           /* $listaComentarios=$comentarioDao->selectALL();
            foreach($listaComentarios as $comentario)
            {
                echo $comentario->toString();
            }*/
            $comentarioDao->selectBYID(1, 1);
	?>
    </body>
</html>
