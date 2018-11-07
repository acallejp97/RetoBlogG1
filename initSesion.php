	<?php
	session_start();
	$usuario=$_POST["usuario"];
	$pwd=$_POST["password"];
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hola Pajarito sin cola</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<h1>HOLA MUNDO ESTOY PROBANDO UNA COSA</h1>
	<p><?php echo $usuario; ?></p>
</body>
</html>