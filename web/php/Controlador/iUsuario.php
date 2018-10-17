<?php
	
	interface iUsuario
	{
		public function selectALL();									//Devuelve todos los usuarios de la tabla
		public function selectByEMAIL($id, $email, $nombre);		    //Devuelve un registro de la tabla que cumpla los criterios que le digamos
		public function update($id, $nombre, $email);					//Actualiza los datos de un usuario
		public function insert($nombre,$password, $email, $permisos);	//Guarda un nuevo usuario
		public function delete($idUsuarioBorrar, $idUsuarioBorra);		//Borra un usuario (cualquiera menos el admin)
	}

?>