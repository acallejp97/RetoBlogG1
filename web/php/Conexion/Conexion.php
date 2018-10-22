<?php
	class Conexion
	{
<<<<<<< HEAD
		private $db="g1blog";
		private $servidor="mysql:host=127.0.0.1;dbname=";
		private $username="root";
		private $password="";
	        private $conn;
		private static $instance=NULL;
		
		private function __construct()
                {
                    
                }
 
		private function __clone(){}
		
		public static function getInstance(){
			if (!isset(self::$instance)) {
			    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
                self::$instance= new PDO("mysql:host=127.0.0.1;dbname="."g1blog","root","",$pdo_options);
=======
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
>>>>>>> fa39edc896b34c5e043b7aa16c31b8b71818e960
			}
			return self::$instance;
                }
                
                public static function cerrar()
                {
                    $instance=null;
                }
                /*function __construct() 
                {
                     $this->db = "g1blog";
                     $this->username = "root";
                     $this->password = "";
                }

                //Creamos conexión
		public function conectar()
		{
                    try
				{
                                        
                                      	$this->conn=new PDO($this->servidor, $this->username, $this->password);
					$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<br><p>Conexión realizada con exito</p><br>";
				}
				catch (PDOException $e)
				{
					echo "Conexión fallida: ".$e->getMessage();
				}
				return $this->conn;
			}

			public function cerrarConn()
			{
				$this->conn=null;
			}*/
	}
?>