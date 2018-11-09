<?php
session_start();

define('RAIZ_APLICACION', dirname(__FILE__));

include_once RAIZ_APLICACION . '../Controlador/usuarioDTO.php';
include_once RAIZ_APLICACION . '../Controlador/UsuarioControler.php';

$usuario = $_POST["usuario"];
$pwd = $_POST["password"];
$usuarioDto = new usuarioDTO();
$usuarioControl = new UsuarioController();
$usuarioDto = $usuarioControl->login($usuario, $pwd);
$_SESSION["usuario"] = $usuarioDto;
header("Location: " . RAIZ_APLICACION . "/index1.php");
