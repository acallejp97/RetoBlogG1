<?php
$db = "G1Blog";
$servidor = "localhost";
$username = "root";
$password = "";
$conn;
class Conexion
{
    private static $instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {}

    public static function getInstance()
    {
        global $db, $servidor, $username, $password, $conn;
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO("mysql:host=" . $servidor . ";dbname=" . $db, $username, $password, $pdo_options);
        }
        return self::$instance;
    }

    public static function cerrar()
    {
        $instance = null;
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
