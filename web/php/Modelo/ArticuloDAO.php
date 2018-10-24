<?php
include_once 'Controlador/articuloDTO.php';
include_once 'Modelo/iArticulo.php';

/**
 * Description of ArticuloDAO
 *
 * @author victor manuel
 */
class ArticuloDAO implements iArticulo
{
    private $sqlALL = "SELECT * FROM articulos";
    private $sqlByID = "SELECT * FROM articulos WHERE id=?";
    private $sqlUPDATE = "UPDATE articulos SET texto=?, valoracion=?, categoria=? WHERE id=?";
    private $sqlINSERT = "INSERT INTO articulos (fecha,texto,id_autor,valoracion,categoria,publicado) VALUES (?,?,?,?,?,?)";
    private $sqlDELETE = " DELETE FROM articulos WHERE id=?";
    //Borra un articulo de la base de datos
    public function delete($idArticulo, $idOrder)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlDELETE);
        $db->bindParam(1, $idArticulo);
        $temp = $consulta->execute();
    }

    //Selecciona todos los registros de la base de datos
    public function selectALL()
    {
        $temp = [];
        $db = Conexion::getInstance();
        $listaArticulos = $db->query($this->sqlALL);
        while ($articuloTemp = $listaArticulos->fetch()) {
            $articulo = new articuloDTO();
            $articulo->setidUsuario($articuloTemp["id"]);
            $articulo->setFecha($articuloTemp["fecha"]);
            $articulo->setTexto($articuloTemp["texto"]);
            $articulo->setIdAutor($articuloTemp["id_autor"]);
            $articulo->setIdAutor($articuloTemp["valoracion"]);
            $articulo->setCategoria($articuloTemp["categoria"]);
            $articulo->setCategoria($articuloTemp["publicado"]);
            array_push($temp, $articulo);
            echo $articulo->toString(); //Es para probar que todo va bien. En la versión definitiva desaparece
        }
        return $temp;
    }

    //Actualiza un registro de la base de datos
    public function update($idArticulo, $fecha, $texto, $idOrder)
    {

    }

    //Guarda un registro de la base de datos
    public function insert($fecha, $texto, $idAutor, $valoracion, $categoria, $publicado)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlINSERT);
        $db->bindParam(1, $fecha);
        $db->bindParam(2, $texto);
        $db->bindParam(3, $idAutor);
        $db->bindParam(4, $valoracion);
        $db->bindParam(5, $categoria);
        $db->bindParam(6, $publicado);

        $temp = $consulta->execute();
        return $temp;
    }

    //Selecciona un articulo por el identificador
    public function selectBYID($id)
    {

    }

    //Devuelve los articulos en función a la fecha de publicación
    public function selectByFecha($fecha)
    {

    }

}
