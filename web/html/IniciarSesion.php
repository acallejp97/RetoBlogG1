<?php
   session_start();
   include_once RAIZ_APLICACION . '/../php/Controlador/usuarioDTO.php';
   include_once RAIZ_APLICACION . '/../php/Controlador/UsuarioControler.php';
   $usuario=$_POST["usuario"];
   $pwd=$_POST["password"];
   $usuarioDto=new usuarioDTO();
   $usuarioControl=new UsuarioControler();
   $usuarioDto=$usuarioControl->login($usuario, $pwd);
   $_SESSION["usuario"]=$usuarioDto;
   echo $usuarioDto->toString();
    header('Location: index1.php');
?>               
