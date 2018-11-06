<?php
session_start();
include_once '../Controlador/usuarioDTO.php';
include_once '../Controlador/UsuarioControler.php';
$usuario = $_POST["usuario"];
$pwd = $_POST["password"];
$usuarioDto = new usuarioDTO();
$usuarioControl = new UsuarioController();
$usuarioDto = $usuarioControl->login($usuario, $pwd);
$_SESSION["usuario"] = $usuarioDto;
header("Location: ../../html/index1.php");
