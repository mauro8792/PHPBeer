<?php namespace DAO;

use Modelo\Cuenta as Cuenta;
use DAO\Conexion as Conexion;

class CuentaDAO  implements IDAO{
	
	public $con;
	protected static $instance;

	private function __construct(){

	}


	public static function getInstance()
    {
        if (!isset(self::$instance)) {
            //$miclase = __CLASS__;
            self::$instance = new self;//$miclase;
        } 
        return self::$instance;
    }



	public function insertar($cuenta) {
		try {

			$email = $cuenta->getEmail();
			$password = $cuenta->getPassword();
			$rol= "Cliente";

	//		$email = $cuenta['email'];
	//		$password = $cuenta['pass'];
	//		$rol= "Cliente";


		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "insert into cuenta values(:email, :pass, :rol)";

		$statement = $conexion->prepare($sql);
		$statement->bindParam(":email", $email);
		$statement->bindParam(":pass", $password);
		$statement->bindParam(":rol", $rol);
		$statement->execute();

		$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				//echo "ERROR: " . $e->getMessage();
				throw new Exception("Se rompio todo", 1);
				
		}
		$con = null; 

	}

	public function eliminar($cuenta) {
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from cuenta where email = :email";
			
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $cuenta->getEmail());
			$statement->execute();
		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
		}

		$con = null; 
	}

	public function modificar($cuenta,$id){ ///// ver!!!
		try{
 
			$con = new Conexion();
			$conexion = $con->conectar();

			$sql = "update cuenta set password = :password where email = :email";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $cuenta->getEmail());
			$statement->bindParam(':password', $cuenta->getPassword());
			$statement->execute();
		} catch(PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}

	public function listar() {
			$fila = null;
			try{
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql="select * from cuenta";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				while($resultado = $statement->fetch()){
				$fila[] = $resultado; 
			}
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $fila;
	}


	public function buscar($cuenta){
		try{
			$con = new Conexion();
			$conexion = $con->conectar();
			$resultado=null;
			$email = $cuenta['email'];
			$pass = $cuenta['password'];
			$sql = "select email, pass, rol from cuenta where email = :email and pass = :pass";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':pass', $pass);
			$statement->execute();
			$resultado = $statement->fetchAll(); 
			
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}


}