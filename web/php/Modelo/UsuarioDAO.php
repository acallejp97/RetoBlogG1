<?php
<<<<<<< HEAD
    include_once 'Controlador/usuariosDTO.php';
   // include_once 'Conexion\Conexion.php';
	class UsuarioDAO
	{		
		private $sqlALL="SELECT * FROM usuarios";		
		private $sqlByID="SELECT permisos FROM usuarios WHERE id=?";
		private $sqlUPDATE="UPDATE usuarios SET nombre=?, email=? WHERE id=?";
		private $sqlINSERT="INSERT INTO usuarios (nombre,password,email,permisos) VALUES (?,?,?,?)";  
		private $sqlDELETE=" DELETE FROM usuarios WHERE id=? AND (id=? OR id=?)";
=======
	include "../Controlador/usuario.php";
	include "../Conexion/Conexion.php";
	class Usuario implements iUsuario
	{
		private $usuario;
		private $sqlALL="SELECT * FROM usuarios";
		private $sqlByEMAIL="SELECT * FROM usuarios WHERE email=?";
		private $sqlByID="SELECT permisos FROM usuarios WHERE id=?";
		private $sqlUPDATE="UPDATE usuarios SET nombre=?, email=? WHERE id=?";
		private $sqlINSERT="INSERT INTO usuarios (nombre,) VALUES (?,?,?,?)";
		private $sqlDELETE=" DELETE FROM usuarios WHERE id=?";
>>>>>>> fa39edc896b34c5e043b7aa16c31b8b71818e960
		//Devuelve todos los usuarios de la tabla
		public function selectALL()	
		{
                    $listaUsuario=[];   //array que coje el resultado de la query
                    $temp=[]; //array en el que guardamos los objetos usuarios
			$db= Conexion::getInstance();
			$listaUsuario=$db->query($this->sqlALL);
			while ($usuarioTemp=$listaUsuario->fetch())
			{
				$usuario= new usuariosDTO();
				$usuario->setidUsuario($usuarioTemp["id"]);
				$usuario->setNombre($usuarioTemp["nombre"]);
				$usuario->setPwd($usuarioTemp["password"]);
				$usuario->setEmail($usuarioTemp["email"]);
				$usuario->setPermisos($usuarioTemp["permisos"]);
                                array_push($temp,$usuario);
			}
			return $temp;
		}
		//Devuelve un registro de la tabla que cumpla los criterios que le digamos
		public function selectByEMAIL($email)
		{
			$sqlByEMAIL="SELECT * FROM usuarios WHERE email='".$email."'";
			$db=Conexion::getInstance();
                        $temp=[];
			//Utilizamos una consulta preparada
			$listaUsuarios=$db->query($sqlByEMAIL);
			while($usuarioTemp=$listaUsuarios->fetch())
			{
				$usuario=new usuariosDTO();
				$usuario->setidUsuario($usuarioTemp["id"]);
				$usuario->setNombre($usuarioTemp["nombre"]);
				$usuario->setPwd($usuarioTemp["password"]);
				$usuario->setEmail($usuarioTemp["email"]);
				$usuario->setPermisos($usuarioTemp["permisos"]);
				array_push($temp,$usuario);
			}
                        
			return $temp;
		}		
		//Actualiza los datos de un usuario    
		public function update($id, $nombre, $email)
		{
			try	
			{
				$db=Conexion::getInstance();
				$consulta=$db->prepare($this->sqlUPDATE);
				$consulta->bindParam(1,$nombre);
				$consulta->bindParam(2,$email);
				$consulta->bindParam(3,$id);
				$temp=$consulta->execute();                               
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
			return $temp;
		}	
		//Guarda un nuevo usuario				
		public function insert($nombre,$password, $email, $permisos)
		{
                    $db=Conexion::getInstance();
		    $consulta=$db->prepare($this->sqlINSERT);
		    $consulta->bindParam(1,$nombre);
		    $consulta->bindParam(2,$password);
		    $consulta->bindParam(3,$email);
                    $consulta->bindParam(4,$permisos);
		    $temp=$consulta->execute(); 
                   
			return $temp;
		}	
		//Borra un usuario (cualquiera menos el admin)
		public function delete($idUsuarioBorrar, $idOrder)
		{
		    $db=Conexion::getInstance();
		    $consulta=$db->prepare($this->sqlDELETE);
		    $consulta->bindParam(1,$idUsuarioBorrar);
		    $consulta->bindParam(2,$$idUsuarioBorrar);
                    $consulta->bindParam(3,$idOrder);
                    $temp=$consulta->execute();
		    return $temp;
		}		
	}

?>