<?php
 /*include_once 'Controlador/articuloDTO.php';
 include_once 'Modelo/iArticulo.php';*/
<<<<<<< HEAD
    include_once '../php/Controlador/articuloDTO.php';
   include_once '../php/Modelo/iArticulo.php';
=======

//  include_once '../php/Controlador/articuloDTO.php';
//  include_once '../php/Modelo/iArticulo.php';

 include_once '../Controlador/articuloDTO.php';
 include_once './iArticulo.php';
>>>>>>> fa2f82abc23e0a20d81c2adc9cc2c5c22d011022

class ArticuloDAO implements iArticulo{
   private $sqlALL="SELECT * FROM articulos ORDER BY fecha";		
   private $sqlByID="SELECT * FROM articulos WHERE id=";
   private $sqlUPDATE="UPDATE articulos SET texto=?, valoracion=?, categoria=?, publicado=?, fecha=? WHERE id=?";
   private $sqlINSERT="INSERT INTO articulos (fecha,texto,id_autor,valoracion,categoria,publicado) VALUES (?,?,?,?,?,?)";  
   private $sqlDELETE=" DELETE FROM articulos WHERE id=?";
   private $sqlSELECTByDATE="SELECT * FROM articulos WHERE fecha>=";
   private $sqlCUSTOM="SELECT * FROM articulos WHERE 1=1";
   public function __construct()
   {
       
   }
   //Borra un articulo de la base de datos 
   public function delete($idArticulo, $idOrder) {
        //Mirar si el execute devuelve algo para luego lanzar aviso en la parte de la vista.
        $db=Conexion::getInstance();
        $consulta=$db->prepare($this->sqlDELETE);
        $consulta->bindParam(1,$idArticulo);
        $temp=$consulta->execute();
        return $temp;
    }
    
    //Selecciona todos los registros de la base de datos
    public function selectALL() {
        $this->sqlALL="SELECT * FROM articulos";
        $temp=[];
        $db= Conexion::getInstance();
        $listaArticulos=$db->query($this->sqlALL);
        while($articuloTemp=$listaArticulos->fetch())
        {            
            $articulo= new articuloDTO();
            $articulo->setIdArticulo($articuloTemp["id"]);
            $articulo->setTitulo($articuloTemp["titulo"]);
            $articulo->setFecha($articuloTemp["fecha"]);
            $articulo->setTexto($articuloTemp["texto"]);
            $articulo->setIdAutor($articuloTemp["id_autor"]);
            $articulo->setValoracion($articuloTemp["valoracion"]);
            $articulo->setIdCategoria($articuloTemp["categoria"]);
            $articulo->setPublicado($articuloTemp["publicado"]);
            array_push($temp,$articulo);
        }
        return $temp;
    }
    
    public function selectCustom($nombre, $fecha)
        {
            $temp=[];
            if (isset($nombre))
            {
                $this->sqlCUSTOM." AND nombre='".$nombre."'";
            }
            if (isset($fecha))
            {
                $this->sqlCUSTOM." AND fecha='".$fecha."'";
            }
            $db= Conexion::getInstance();
            $listaArticulos=$db->query($this->sqlCUSTOM);
            while ($articuloTemp=$listaArticulos->fetch())
            {
                $articulo= new articuloDTO();
                $articulo->setIdArticulo($articuloTemp["id"]);
                $articulo->setTitulo($articuloTemp["titulo"]);
                $articulo->setFecha($articuloTemp["fecha"]);
                $articulo->setTexto($articuloTemp["texto"]);
                $articulo->setIdAutor($articuloTemp["id_autor"]);
                $articulo->setValoracion($articuloTemp["valoracion"]);
                $articulo->setIdCategoria($articuloTemp["categoria"]);
                $articulo->setPublicado($articuloTemp["publicado"]);
                array_push($temp,$articulo);
            }
            return temp;
            }    
   
    //Actualiza un registro de la base de datos
    public function update($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder) {
        //Falta titulo y categoría.
        $db=Conexion::getInstance();
       	$consulta=$db->prepare($this->sqlUPDATE);
        $consulta->bindParam(1,$texto);
        $consulta->bindParam(2,$valoracion);
        $consulta->bindParam(3,$categoria);
        $consulta->bindParam(4,$publicado);
        $consulta->bindParam(5,$fecha);
        $consulta->bindParam(6,$idArticulo);
        echo $this->sqlUPDATE;
        $temp=$consulta->execute();
        return $temp;
    }
    
    //Guarda un registro de la base de datos
    public function insert($fecha, $texto, $idAutor, $valoracion, $categoria, $publicado) {
        
        $db=Conexion::getInstance();
        $consulta=$db->prepare($this->sqlINSERT);
        $consulta->bindParam(1,$fecha);
        $consulta->bindParam(2,$texto);
        $consulta->bindParam(3,$idAutor);
        $consulta->bindParam(4,$valoracion);
        $consulta->bindParam(5,$categoria);
        $consulta->bindParam(6,$publicado);        
        $temp=$consulta->execute();
        return $temp;
    }
    
    //Selecciona un articulo por el ideificador
    public function selectBYID($id) {
        $db=Conexion::getInstance();
        $temp=[];
        $listaUsuarios=$db->query($this->sqlByID.$id);
        while($temp=$listaUsuarios->fetch())
        {
            $articuloDto=new ArticuloDTO();
            $articuloDto->setIdArticulo($temp["id"]);
           $articuloDto->setTexto($temp["texto"]);    
            $articuloDto->setIdAutor($temp["id_autor"]);        
            $articuloDto->setValoracion($temp["valoracion"]);            
            $articuloDto->setIdCategoria($temp["categoria"]);
            $articuloDto->setPublicado($temp["publicado"]); 
            $articuloDto->setFecha($temp["fecha"]);
            $articuloDto->toString();           
        }
        echo $articuloDto->toString();
        return $articuloDto;
    }
    //Devuelve los articulos en función a la fecha de publicación
    public function selectByFecha($fecha) {
        $temp=[];//Variable para guardar y devolver la lista de articulos que salga de la SELECT
        $db=Conexion::getInstance();
	    $listaArticulos=$db->query($this->sqlSELECTByDATE.$fecha);        
        while($articuloTemp=$listaArticulos->fetch())
        {            
            $articulo= new articuloDTO();
            $articulo->setIdArticulo($articuloTemp["id"]);
            $articulo->setFecha($articuloTemp["fecha"]);
            $articulo->setTexto($articuloTemp["texto"]);
            $articulo->setIdAutor($articuloTemp["id_autor"]);
            $articulo->setValoracion($articuloTemp["valoracion"]);
            $articulo->setIdCategoria($articuloTemp["categoria"]);
            $articulo->setPublicado($articuloTemp["publicado"]);
            //echo $articulo->toString();
            array_push($temp,$articulo);
        }
        return $temp;
    }
}
