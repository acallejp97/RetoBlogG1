<?php 
	interface iArticulo
	{
		public function selectALL(); 							//Saca todos los articulos publicados ordenados por fecha
		public function selectBY($nombre, $email, $fecha);		/*Saca los articulos filtrados por nombre del autor 
																 (o su email) y/o la fecha de publicación*/
		public function delete($idArticulo,$idOrder);			/*Borra un articulo identificando si es el autor o el 
																  administrador*/
		public function update($idArticulo, $fecha, $texto, $idOrder); /*Actualiza el contenido del articulo (solo el autor o
	                                                                     el administrador)*/
	}

?>