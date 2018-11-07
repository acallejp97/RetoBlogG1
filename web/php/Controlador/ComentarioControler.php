<?php 
	include_once RAIZ_APLICACION . '/Modelo/ComentarioDAO.php';
    include_once RAIZ_APLICACION . '/Controlador/comentariosDTO.php';

 	class ComentarioControler
 	{
 		private $comentarioDao;

 		function __construct()
 		{
 			$this->comentarioDao=new ComentarioDAO();
 		}

 		/*Llama a la funcio de ComentariosDAO que busca todos los comentarios y los devuelve en un array de objetos comentariosDTO*/
 		public function buscarTodosComentarios()
 		{

 			$listacomentarios=$this->comentarioDao->selectALL();
 			return $listacomentarios;
 		}

 		public function actualizarComentario($id,$texto,$fecha,$idArticulo,$idUsuario)
 		{
 			$numFilas=$this->comentarioDao->update($id,$texto,$fecha,$idArticulo,$idUsuario);
 			return $numFilas;
 		}

 		public function guardarRegistro($texto, $fecha, $id_articulos, $id_usuario)
 		{
 			$numFilas=$this->comentarioDao->insert($texto, $fecha, $id_articulos, $id_usuario);
 		}

 		public function buscarComentarioPorID($idComentario, $idArticulo)
 		{
 			$listaComentarios=[];
 			$listaComentarios=$this->comentarioDao->selectBYID($idComentario, $idArticulo);
 			return $listaComentarios;
 		}
 	}
?>