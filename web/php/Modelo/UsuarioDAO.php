<?php
	include "../Controlador/usuario.php";
	include "../Conexion/Conexion.php";
	class Usuario implements iUsuario
	{
		private $usuario;
		private $sqlALL="SELECT * FROM usuarios";
		private $sqlByEMAIL="SELECT * FROM usuarios WHERE email=?";
		private $sqlByID="SELECT permisos FROM usuarios WHERE id=?";
		private $sqlUPDATE="UPDATE usuarios SET nombre=?, email=? WHERE id=?";
		private $sqlINSERT="INSERT INTO usuarios (nombre,) VALUES (?,?,?,?)";
		private $sqlDELETE=" DELETE FROM usuarios WHERE id=?";
		//Devuelve todos los usuarios de la tabla
		public function selectALL()	
		{

		}
		//Devuelve un registro de la tabla que cumpla los criterios que le digamos
		public function selectByEMAIL($id, $email, $nombre)
		{

		}		
		//Actualiza los datos de un usuario    
		public function update($id, $nombre, $email)
		{

		}	
		//Guarda un nuevo usuario				
		public function insert($nombre,$password, $email, $permisos)
		{

		}	
		//Borra un usuario (cualquiera menos el admin)
		public function delete($idUsuarioBorrar, $idOrder)
		{

		}		
	}

?>