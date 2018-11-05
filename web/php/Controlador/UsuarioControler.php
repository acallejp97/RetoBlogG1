<?php
	include '/Modelo/UsuarioDAO';
	include 'Controlador/usuarioDTO';
	class UsuarioController
	{
		private $usuarioDao;
        function __construct()
        {
                   $this->usuarioDao=new UsuarioDAO(); 
         }
		/*Llama a la clase selectALL de UsuariosDAO y devuelve un array de objetos usuariosDTO con la lista de todos los usuarios que hay en la BD*/
		public function buscarTodosUsuarios()
		{
			$listaUsuario=$usuarioDao->selectALL();
            return $listaUsuario;
		}
		
		public function buscarPorCorrreo($email)
		{
			$listaUsuarios= $usuarioDao->selectByEMAIL($email);
			return listaUsuarios;
		}
		
		public function actualizarUsuario($id, $nombre, $email)
		{
			$numFilas=$usuarioDao->update($id, $nombre, $email);
			return $numFilas;
		}
		
		public function guardarUsuario($nombre,$password, $email, $permisos)
		{
			$numFilas=$usuarioDao->insert($nombre,$password, $email, $permisos);
			return $numFilas;
		}
    }
?>
