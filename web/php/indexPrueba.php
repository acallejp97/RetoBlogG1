<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prueba</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		include "./Controlador/usuarioDTO.php";
		include "./Modelo/UsuarioDAO.php";
		include "./Conexion/Conexion.php";
		$conn1;
		$salida;
		$listaUsuarios=$usuarioDAO=new UsuarioDAO();
		$conectar=new Conexion();
		$conn1=$conectar->conectar();
		$usuarioDAO->selectALL($conn1);
		foreach($listaUsuarios as $usuario1)
		{
			$salida=$salida+"Email: ".$usuario1->getEmail()." Permisos: ".$usuario1->getPermisos();
		}
		echo "<p>".$salida."</p>";
		$conectar->cerrarConn();
	?>
	
</body>
</html>