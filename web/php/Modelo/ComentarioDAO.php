<?php
include_once 'Controlador/comentariosDTO.php';
include_once 'Modelo/iComentario.php';

/**
 * Description of ComentarioDAO
 *
 * @author victor manuel
 */
class ComentarioDAO //implements iComentario
{
    private $sqlALL = "SELECT * FROM comentarios";
    private $sqlByID = "SELECT * FROM comentarios WHERE id=";
    private $sqlUPDATE = "UPDATE comentarios SET texto=?, fecha=?, id_articulos=?, id_usuario=? WHERE id=?";
    private $sqlINSERT = "INSERT INTO comentarios (texto,fecha,id_articulos,id_usuario) VALUES (?,?,?,?)";
    private $sqlDELETE = " DELETE FROM comentarios WHERE id=?";
    //Borra un comentario de la base de datos. Devuelve el número de filas afectadas
    public function delete($idComentario, $idArticulo, $idUsuario)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlDELETE);
        $consulta->bindParam(1, $idComentario);
        $temp = $consulta->execute();
        return $temp;
    }

    //Selecciona todos los registros de la base de datos y los devuelve en un array de objetos tipo comentarioDTO
    public function selectALL()
    {
        $temp = [];
        $db = Conexion::getInstance();
        $listaComentarios = $db->query($this->sqlALL);
        while ($comentarioTemp = $listaComentarios->fetch()) {
            $comentario = new comentariosDTO();
            $comentario->setIdComentario($comentarioTemp["id"]);
            $comentario->setComentario($comentarioTemp["texto"]);
            $comentario->setFecha($comentarioTemp["fecha"]);
            $comentario->setIdArticulo($comentarioTemp["id_articulos"]);
            $comentario->setIdAutor($comentarioTemp["id_usuario"]);
            array_push($temp, $comentario);
            
        }
        return $temp;
    }

    //Actualiza un registro de la base de datos
    public function update($id,$texto,$fecha,$idArticulo,$idUsuario)
    {
        //private $sqlUPDATE = "UPDATE comentarios SET comentario=?, fecha=?, id_articulos=?, id_usuario WHERE id=?";
        $db= Conexion::getInstance();
        $consulta=$db->prepare($this->sqlUPDATE);
        $consulta->bindParam(1, $texto);
        $consulta->bindParam(2, $fecha);
        $consulta->bindParam(3, $idArticulo);
        $consulta->bindParam(4,$idUsuario);
        $consulta->bindParam(5,$id);
        $temp=$consulta->execute();
        return $temp;
    }

    //Guarda un registro de la base de datos
    public function insert($texto, $fecha, $id_articulos, $id_usuario)
    {
        //private $sqlINSERT = "INSERT INTO comentarios (texto,fecha,id_articulos,id_usuario) VALUES (?,?,?,?)";
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlINSERT);
        $consulta->bindParam(1, $texto);
        $consulta->bindParam(2, $fecha);
        $consulta->bindParam(3, $id_articulos);
        $consulta->bindParam(4, $id_usuario);

        $temp = $consulta->execute();
        return $temp;
    }

    //Selecciona un comentario por el identificador
    public function selectBYID($idComentario, $idUsuario)
    {
      $this->sqlByID=$this->sqlByID.$idComentario;
      $db= Conexion::getInstance();
           
      $comentario1=$db->query($this->sqlByID);
     /* $consulta->bindParam(1, $idComentario);
      $comentario=$consulta->execute();*/
      if($comentario=$comentario1->fetch())
      {       
        $comentarioDto = new comentariosDTO();
        $comentarioDto->setIdComentario($comentario["id"]);
        $comentarioDto->setComentario($comentario["texto"]);
        $comentarioDto->setFecha($comentario["fecha"]);
        $comentarioDto->setIdArticulo($comentario["id_articulos"]);
        $comentarioDto->setIdAutor($comentario["id_usuario"]);
      }
      echo $comentarioDto->toString();
      return $comentarioDto;
      
    }

    //Devuelve los comentarios en función a la fecha de publicación
    public function selectByFecha($fecha)
    {

    }
}
