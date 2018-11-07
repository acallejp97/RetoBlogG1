<?php
    include_once '../php/Modelo/ArticuloDAO.php';
    include_once '../php/Controlador/articuloDTO.php';
    //include_once '/home/ik_2dw3/Escritorio/WEBS/DWS/Victor/RetoBlogG1/web/php/Modelo/ArticuloDAO.php';
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
            
            $temp=$this->articuloDao->insert($fecha, $texto, $idAutor, $valoracion, $categoria, $publicado);
            return $temp;
        }

        public function borrarArticulo ($idArticulo, $idOrder)
        {
            
            $temp=$this->articuloDao->delete($idArticulo, $idOrder);
            return $temp;
        }

        public function actualizarArticulo($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder)
        {
            $temp=$this->articuloDao->update($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder);
            return $temp;
        }
        
        public function buscarArticuloPorId($id)
        {
            $articuloDto= new articuloDTO();
            $articuloDto=$this->articuloDao->selectBYID($id);
            return $articuloDto;
        }
    
       public function buscarPorFecha($fecha)
       {
           $temp=$this->articuloDao->selectByFecha($fecha);
           return $temp;
       }
        
       public function buscarCustom($nombre, $fecha)
       {
           $temp=[];
           $temp= $this->buscarCustom($nombre, $fecha);
           return $temp;
       }
    }
?>