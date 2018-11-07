<?php
<<<<<<< HEAD
   session_start();
   include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/usuarioDTO.php';
   include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/UsuarioControler.php';
  // include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\usuarioDTO.php';
   //include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\UsuarioControler.php';
   $usuario=$_POST["usuario"];
   $pwd=$_POST["password"];
   $usuarioDto=new usuarioDTO();
   $usuarioControl=new UsuarioController();
   $usuarioDto=$usuarioControl->login($usuario, $pwd);
   $_SESSION["usuario"]=$usuarioDto;
   echo $usuario." ".$pwd;
    //header("https://www.google.com/");
?>               
=======
session_start();
//    include_once '../Controlador/usuarioDTO.php';
//    include_once '../Controlador/UsuarioControler.php';

include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/usuarioDTO.php';
include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Controlador/UsuarioControler.php';

// include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\usuarioDTO.php';
//include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\UsuarioControler.php';
$usuario = $_POST["usuario"];
$pwd = $_POST["password"];
$usuarioDto = new usuarioDTO();
$usuarioControl = new UsuarioController();
$usuarioDto = $usuarioControl->login($usuario, $pwd);
$_SESSION["usuario"] = $usuarioDto;
header("Location: C:\wamp64\www\RetoBlogG1\html\index1.php");
>>>>>>> fa2f82abc23e0a20d81c2adc9cc2c5c22d011022
