<?php
 include_once 'Controlador/articuloDTO.php';
 include_once 'Modelo/iArticulo.php';

class ArticuloDAO implements iArticulo{
   private $sqlALL="SELECT * FROM articulos";		
   private $sqlByID="SELECT * FROM articulos WHERE id=?";
   private $sqlUPDATE="UPDATE articulos SET texto=?, valoracion=?, categoria=?, publicado=? WHERE id=?";
   private $sqlINSERT="INSERT INTO articulos (fecha,texto,id_autor,valoracion,categoria,publicado) VALUES (?,?,?,?,?,?)";  
   private $sqlDELETE=" DELETE FROM articulos WHERE id=?";
   private $sqlSELECTByDATE="SELECT * FROM articulos WHERE fecha>=?";

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
        $temp=[];
        $db= Conexion::getInstance();
        $listaArticulos=$db->query($this->sqlALL);
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
            array_push($temp,$articulo);
           
        }
        return $temp;
    }
    
    //Actualiza un registro de la base de datos
    public function update($idArticulo, $fecha, $texto, $valoracion, $publicado, $titulo, $idOrder) {
        $db=Conexion::getInstance();
       //private $sqlUPDATE="UPDATE articulos SET texto=?, valoracion=?, categoria=?, publicado=? WHERE id=?";
		$consulta=$db->prepare($this->sqlUPDATE);
        //$consulta->bindParam(1,$fecha);
        //$this->$sqlUPDATE="UPDATE articulos SET texto=".$texto.", valoracion=".$valoracion.", categoria= ";
        $categoria=3;
		$consulta->bindParam(1,$texto);
        $consulta->bindParam(2,$valoracion);
        $consulta->bindParam(3,$categoria);
        $consulta->bindParam(4,$publicado);
        $consulta->bindParam(5,$idAritculo);
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
        echo "Entra en selectBYID<br>";
        $db=Conexion::getInstance();
        echo "coje la instancia<br>";
        $consulta=$db->prepare($this->sqlByID);
        echo "mete el parametro<br>";
        $consulta->bindParam(1,$id);
        $temp=$consulta->execute();
        echo "ejecuta la consulta<br>";
            $articuloDto=new articuloDTO();
            $articuloDto->setIdArticulo($temp["id"]);
            $articuloDto->setTexto($temp["texto"]);
            $articuloDto->setIdAutor($temp["id_autor"]);
            $articuloDto->setValoracion($temp["valoracion"]);
            $articuloDto->setIdCategoria($temp["categoria"]);
            $articuloDto->setPublicado($temp["publicado"]);
            $articuloDto->toString();
        
        return $articuloDto;
    }
    //Devuelve los articulos en función a la fecha de publicación
    public function selectByFecha($fecha) {
           
        $temp=[];//Variable para guardar y devolver la lista de articulos que salga de la SELECT
        $db=Conexion::getInstance();
        $consulta=$db->prepare($this->sqlSELECTByDATE);
        $consulta->bindParam(1,$fecha);
        $listaArticulos=$consulta->execute();
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
            array_push($temp,$articulo);
        }
        return $articuloTemp;
    }

}
