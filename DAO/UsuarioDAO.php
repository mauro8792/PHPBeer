<?php namespace DAO;

use Modelo\Usuario as Usuario;
use DAO\Conexion as Conexion;

class UsuarioDAO extends Conexion implements IDAO{
	
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

    

	public function insertar($Usuario) {
		try {

			$nombre		= $Usuario->getNombre();
			$apellido 	= $Usuario->getApellido();
			$direccion 	= $Usuario->getDireccion();
			$telefono 	= $Usuario->getTelefono();
			$email		= $Usuario->getEmail();
			
	//		$nombre		= $Usuario['nombre'];
	//		$apellido 	= $Usuario['apellido'];
	//		$direccion 	= $Usuario['direccion'];
	//		$telefono 	= $Usuario['telefono'];
	//		$email		= $usuario['email'];
			

		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "insert into usuario values(:nombre, :apellido, :direccion, :telefono, :email)";

		$statement = $conexion->prepare($sql);
		$statement->bindParam(":nombre", $nombre);
		$statement->bindParam(":apellido", $apellido);
		$statement->bindParam(":direccion", $direccion);
		$statement->bindParam(":telefono", $telefono);
		$statement->bindParam(":email", $email);
		$statement->execute();

		$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function eliminar($Usuario) {
		 
	}

	public function modificar($Usuario,$id) {
		
	}

	public function listar() {
	
	}


	public function buscar($Usuario){
	
	}


}