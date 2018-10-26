<?php
    include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/web/php/Modelo/ArticuloDAO.php';;
    class ArticuloControler
    {
        private $articuloDao;
         

        function __construct()
        {
            $this->articuloDao=new ArticuloDAO();
        }

        public function buscarTodosArticulos()
        {
            $temp=[];
			$temp=$this->articuloDao->selectALL();			
			return $temp;
            
        }

        public function guardarArticulo($fecha, $texto, $idAutor, $valoracion, $categoria, $publicado)
        {
            $temp=$this->articuloDao->selectALL( $fecha, $texto, $idAutor, $valoracion, $categoria, $publicado);
            return $temp;
        }

        public function borrarArticulo ($idArticulo, $idOrder)
        {
            $temp=$this->articuloDao->delete($idArticulo, $idOrder);
        }

        public function actualizarArticulo($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder)
        {
            $temp=$this->articuloDao->update($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder);
        }
    }
?>