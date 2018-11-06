<?php
	class Conexion
	{
		private $db="g1blog";
		private $servidor="mysql:host=127.0.0.1;dbname=";
		private $username="root";
		private $password="";
	        private $conn;
		private static $instance=NULL;
		
		private function __construct(){}
 
		private function __clone(){}
		
		public static function getInstance(){
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$instance= new PDO('mysql:host=localhost;dbname=g1reto','root','',$pdo_options);
			}
			return self::$instance;
		}
	}
?>