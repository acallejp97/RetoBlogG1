<?php
session_start();
    define('RAIZ_APLICACION', dirname(__FILE__));
    include_once RAIZ_APLICACION . '/../php/Controlador/usuarioDTO.php';
    include_once RAIZ_APLICACION . '/../php/Controlador/UsuarioControler.php';
  /* include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\usuarioDTO.php';
   include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\UsuarioControler.php';*/
   $usuario=$_POST["usuario"];
   $pwd=$_POST["password"];
   $usuarioDto=new usuarioDTO();
   $usuarioControl=new UsuarioController();
   $usuarioDto=$usuarioControl->login($usuario, $pwd);
   $usuario=["idUsuario"=>$usuarioDto->getIdUsuario(),
              "nombre"=>$usuarioDto->getNombre()];
   $_SESSION["usuario"]=$usuario;
   echo $usuarioDto->toString();
    header('Location: index1.php');
?>               
