<?php
class Conexion
{
    private $db = "g1blog";
    private $servidor = "mysql:host=127.0.0.1;dbname=";
    private $username = "root";
    private $password = "";
    private $conn;
    private static $instance = null;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=mvc', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
    /*function __construct()
{
$this->db = "g1blog";
$this->username = "root";
$this->password = "";
}

//Creamos conexión
public function conectar()
{
try
{

$this->conn=new PDO($this->servidor, $this->username, $this->password);
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<br><p>Conexión realizada con exito</p><br>";
}
catch (PDOException $e)
{
echo "Conexión fallida: ".$e->getMessage();
}
return $this->conn;
}

public function cerrarConn()
{
$this->conn=null;
}*/
}
