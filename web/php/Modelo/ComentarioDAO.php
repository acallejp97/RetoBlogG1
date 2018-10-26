<?php
include_once 'Controlador/comentarioDTO.php';
include_once 'Modelo/iComentario.php';

/**
 * Description of ComentarioDAO
 *
 * @author victor manuel
 */
class ComentarioDAO implements iComentario
{
    private $sqlALL = "SELECT * FROM comentarios";
    private $sqlByID = "SELECT * FROM comentarios WHERE id=?";
    private $sqlUPDATE = "UPDATE comentarios SET texto=?, valoracion=?, categoria=? WHERE id=?";
    private $sqlINSERT = "INSERT INTO comentarios (texto,fecha,id_articulos,id_usuario) VALUES (?,?,?,?)";
    private $sqlDELETE = " DELETE FROM comentarios WHERE id=?";
    //Borra un comentario de la base de datos
    public function delete($idComentario, $idOrder)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlDELETE);
        $db->bindParam(1, $idComentario);
        $temp = $consulta->execute();
    }

    //Selecciona todos los registros de la base de datos
    public function selectALL()
    {
        $temp = [];
        $db = Conexion::getInstance();
        $listaComentarios = $db->query($this->sqlALL);
        while ($comentarioTemp = $listaComentarios->fetch()) {
            $comentario = new comentarioDTO();
            $comentario->setIdComentario($comentarioTemp["id"]);
            $comentario->setComentario($comentarioTemp["texto"]);
            $comentario->setFecha($comentarioTemp["fecha"]);
            $comentario->setIdArticulo($comentarioTemp["id_articulos"]);
            $comentario->setIdAutor($comentarioTemp["id_usuario"]);
            array_push($temp, $comentario);
            echo $comentario->toString(); //Es para probar que todo va bien. En la versión definitiva desaparece
        }
        return $temp;
    }

    //Actualiza un registro de la base de datos
    public function update($idComentario, $texto, $fecha, $idOrder)
    {

    }

    //Guarda un registro de la base de datos
    public function insert($texto, $fecha, $id_articulos, $id_usuario)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlINSERT);
        $db->bindParam(1, $texto);
        $db->bindParam(2, $fecha);
        $db->bindParam(3, $id_articulos);
        $db->bindParam(4, $id_usuario);

        $temp = $consulta->execute();
        return $temp;
    }

    //Selecciona un comentario por el identificador
    public function selectBYID($id)
    {

    }

    //Devuelve los comentarios en función a la fecha de publicación
    public function selectByFecha($fecha)
    {

    }

}
