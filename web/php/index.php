<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
            include "./Controlador/usuariosDTO.php";
            include "./Modelo/UsuarioDAO.php";
            include "./Conexion/Conexion.php";
	    $usuarioDAO=new UsuarioDAO();
            $listaUsuarios=$usuarioDAO->selectALL();    
            
            foreach($listaUsuarios as $usuario)
            { 
                echo "Id: ". $usuario->getIdUsuario()." Nombre: ".$usuario->getNombre()."<br>";            
            }
          
            $resultado=0;
            $resultado=$usuarioDAO->delete(2, 2);
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
