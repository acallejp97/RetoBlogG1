<?php
session_start();
include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\usuarioDTO.php';
include_once 'C:\wamp64\www\RetoBlogG1\web\php\Controlador\UsuarioControler.php';
$usuario = $_POST["usuario"];
$pwd = $_POST["password"];
$usuarioDto = new usuarioDTO();
$usuarioControl = new UsuarioController();
$usuarioDto = $usuarioControl->login($usuario, $pwd);
$_SESSION["usuario"] = $usuarioDto;
header("Location: C:\wamp64\www\RetoBlogG1\html\index1.php");
