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
		public function buscarTodosUsuarios()
		{
			$temp=[];
			$listaUsuario=$usuarioDao->selectALL();
                        return $listaUsuario;
		}
		
		}
?>
