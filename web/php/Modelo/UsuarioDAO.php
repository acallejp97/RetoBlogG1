<?php
include_once 'Controlador/usuariosDTO.php';
include_once 'Modelo/iUsuario.php';
// include_once 'Conexion\Conexion.php';
class UsuarioDAO implements iUsuario
{
    private $sqlALL = "SELECT * FROM usuarios";
    private $sqlByID = "SELECT permisos FROM usuarios WHERE id=?";
    private $sqlUPDATE = "UPDATE usuarios SET nombre=?, email=? WHERE id=?";
    private $sqlINSERT = "INSERT INTO usuarios (nombre, password, email, permisos) VALUES (?,?,?,?)";
    private $sqlDELETE = "DELETE FROM usuarios WHERE id=? AND (id=? OR id=?)";
    //Devuelve todos los usuarios de la tabla
    public function selectALL()
    {
        $temp = []; //array en el que guardamos los objetos usuarios
        $db = Conexion::getInstance();
        $listaUsuarios = $db->query($this->sqlALL);
        while ($usuarioTemp = $listaUsuarios->fetch()) {
            $usuario = new usuariosDTO();
            $usuario->setidUsuario($usuarioTemp["id"]);
            $usuario->setNombre($usuarioTemp["nombre"]);
            $usuario->setPwd($usuarioTemp["password"]);
            $usuario->setEmail($usuarioTemp["email"]);
            $usuario->setPermisos($usuarioTemp["permisos"]);
            array_push($temp, $usuario);
        }
        return $temp;
    }
    //Devuelve un registro de la tabla que cumpla los criterios que le digamos
    public function selectByEMAIL($email)
    {
        $sqlByEMAIL = "SELECT * FROM usuarios WHERE email='" . $email . "'";
        $db = Conexion::getInstance();
        $temp = [];
        //Utilizamos una consulta preparada
        $listaUsuarios = $db->query($sqlByEMAIL);
        while ($usuarioTemp = $listaUsuarios->fetch()) {
            $usuario = new usuariosDTO();
            $usuario->setidUsuario($usuarioTemp["id"]);
            $usuario->setNombre($usuarioTemp["nombre"]);
            $usuario->setPwd($usuarioTemp["password"]);
            $usuario->setEmail($usuarioTemp["email"]);
            $usuario->setPermisos($usuarioTemp["permisos"]);
            array_push($temp, $usuario);
        }

        return $temp;
    }
    //Actualiza los datos de un usuario
    public function update($id, $nombre, $email)
    {
        try
        {
            $db = Conexion::getInstance();
            $consulta = $db->prepare($this->sqlUPDATE);
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $email);
            $consulta->bindParam(3, $id);
            $temp = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $temp;
    }
    //Guarda un nuevo usuario
    public function insert($nombre, $password, $email, $permisos)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlINSERT);
        $consulta->bindParam(1, $nombre);
        $consulta->bindParam(2, $password);
        $consulta->bindParam(3, $email);
        $consulta->bindParam(4, $permisos);
        $temp = $consulta->execute();

        return $temp;
    }
    //Borra un usuario (cualquiera menos el admin)
    public function delete($idUsuarioBorrar, $idOrder)
    {
        $db = Conexion::getInstance();
        $consulta = $db->prepare($this->sqlDELETE);
        $consulta->bindParam(1, $idUsuarioBorrar);
        $consulta->bindParam(2, $$idUsuarioBorrar);
        $consulta->bindParam(3, $idOrder);
        $temp = $consulta->execute();
        return $temp;
    }
}
