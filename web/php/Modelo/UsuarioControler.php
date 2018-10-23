<?php
	include 'UsuarioDAO.php';
	//include_once 'usuariosDTO.php';
	class UsuarioControler
	{
		private $usuarioDao;
		public function __construct()
		{
			$this->usuarioDao=new UsuarioDAO();
		}
	   	public function buscarTodosUsuarios()
		{
			$temp=[];
			$temp=$this->usuarioDao->selectALL();			
			return $temp;
		}

		public function altaUsuario($nombre,$password, $email, $permisos)
		{
	
			$temp=$this->usuarioDao->insert($nombre,$password, $email, $permisos);
			return $temp;
		}
		
		public function actualizarUsuario($id, $nombre, $email)
		{
			$temp=$this->usuarioDao->update($id, $nombre, $email);
			return $temp;
		}
                public function borrarUsuario($idUsuarioBorrar, $idOrder)
                {
                    $temp=$this->usuarioDao->delete($idUsuarioBorrar, $idOrder);
                    Conexion::cerrar();
                }
	}
?>
