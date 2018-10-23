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
            /* include "./Controlador/usuariosDTO.php";*/
            include "./Conexion/Conexion.php";
            include "./Modelo/UsuarioControler.php";
	        $usuarioControler=new UsuarioControler();
            $listaUsuarios=$usuarioControler->buscarTodosUsuarios();    
            
            foreach($listaUsuarios as $usuario)
            { 
                echo "Id: ". $usuario->getIdUsuario()." Nombre: ".$usuario->getNombre()."<br>";            
            }
           
            $resultado=0;
         /*   $resultado=$usuarioControler->altaUsuario("Victor","es el mejor", "beorn57@yahoo.es", 2);
            if($resultado>0)
            {
                   echo "<p>El registro se ha añadido con exito</p>";
            }
            else 
            {
                echo "<p>No se ha podido guardar el usuario con exito</p>";
            }*/
            $resultado=0;
            $resultado=$usuarioControler->actualizarUsuario(3, "Sonia Sierra", "matilla22@gmail.com");
            if($resultado>0)
            {
                    echo "<p>El registro se ha actualizaddo con exito</p>";
            }
             else 
            {
                    echo "<p>El registro no se ha actualizado con exito</p>";
            }
            $resultado=0;
            $resultado=$usuarioControler->borrarUsuario(5, 5);
            if($resultado>0)
            {
                echo "<p>El registro se ha borrado con exito</p>";
            }
            else 
            {
                echo "<p>El registro se ha borrado con exito</p>";
            }
            
//$conectar->cerrar();
	?>
    </body>
</html>
