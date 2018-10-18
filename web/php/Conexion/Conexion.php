<?php
	class Conexion
	{
		<?php
			private $db;
			private $servidor;
			private $username;
			private $password;
			private $conn;

			function __construct()
			{
				$db="G1Reto";
			    $servidor="mysql:host=127.0.0.1;dbname=".$db;
			    $username="root";
			    $password="";
			}
			//Creamos conexión
			public function conectar()
			{
				try
				{
					$conn=new PDO($servidor, $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//echo "<br><p>Conexión realizada con exito</p><br>";
				}
				catch (PDOException $e)
				{
					echo "Conexión fallida: ".$e->getMessage();
				}
			}

			public function cerrarConn()
			{
				$conn=null;
			}
	}
?>