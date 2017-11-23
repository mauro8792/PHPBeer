<?php namespace DAO;

use Modelo\Personal as Personal;
use DAO\Conexion as Conexion;

class PersonalDAO extends Conexion implements IDAO{
	
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

    

	public function insertar($personal) {
	try {

			$legajo = $personal->getLegajo();
			$nombre = $personal->getNombre();
		 	$apellido = $personal->getApellido();
		 	$direccion = $personal->getDireccion();
		 	$telefono = $personal->getTelefono();
		 	$email = $personal->getEmail();

			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "insert into personal values(:legajo, :nombre, :apellido, :direccion, :telefono, :email)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':legajo', $legajo);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':direccion',$direccion);
			$statement->bindParam(':telefono',$telefono);
			$statement->bindParam(':email',$email);
			$statement->execute();

			$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function eliminar($legajo) {
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from personal where legajo = :legajo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':legajo', $legajo);
			$statement->execute();

			$message = "Eliminado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		 
	}

	public function modificar($personal) {
		try {

			$legajo = $personal->getLegajo();
			$nombre = $personal->getNombre();
		 	$apellido = $personal->getApellido();
		 	$direccion = $personal->getDireccion();
		 	$telefono = $personal->getTelefono();
		 	$email = $personal->getEmail();
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update personal set nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono, email = :email where legajo = :legajo";
			$statement = $conexion->prepare($sql);

			$statement->bindParam(':legajo', $legajo);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':direccion',$direccion);
			$statement->bindParam(':telefono',$telefono);
			$statement->bindParam(':email',$email);
			$statement->execute();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		
	}

	public function listar() {
		$fila = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;		
	
	}


	public function buscar($legajo){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal where legajo = :legajo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':legajo', $legajo);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	
	}

	public function buscarUltimo(){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal order by legajo desc limit 1";

			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}


}