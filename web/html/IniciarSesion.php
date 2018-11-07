<?php
   session_start();
   include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1L/web/php/Controlador/usuarioDTO.php';
   include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1L/web/php/Controlador/UsuarioControler.php';
  /* include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\usuarioDTO.php';
   include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\UsuarioControler.php';*/
   $usuario=$_POST["usuario"];
   $pwd=$_POST["password"];
   $usuarioDto=new usuarioDTO();
   $usuarioControl=new UsuarioControler();
   $usuarioDto=$usuarioControl->login($usuario, $pwd);
   $_SESSION["usuario"]=$usuarioDto;
   echo $usuarioDto->toString();
    header('Location: index1.php');
?>               
