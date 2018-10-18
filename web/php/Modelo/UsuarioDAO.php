<?php
	class Usuario implements iUsuario
	{
		include "../Controlador/usuario.php";
		include "../Conexion/Conexion.php";
		$usuario;
		$sqlALL="SELECT * FROM usuarios";
		$sqlByEMAIL="SELECT * FROM usuarios WHERE email=?";
		$sqlByID="SELECT permisos FROM usuarios WHERE id=?";
		$sqlUPDATE="UPDATE usuarios SET nombre=?, email=? WHERE id=?";
		$sqlINSERT="INSERT INTO usuarios (nombre,) VALUES (?,?,?,?)";
		$sqlDELETE=" DELETE FROM usuarios WHERE id=?";
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