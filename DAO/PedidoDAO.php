<?php namespace DAO;
	
	Use Modelo\Pedido as Pedido;
	Use DAO\Conexion as Conexion;
	/**
	* 
	*/
	class PedidoDAO implements IDAO
	{
		
		private function __construct()
		{
			
		}
		protected $table= 'pedidos';
		protected static $instance;

		public static function getInstance(){
			if (!isset(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}
        
        public function insertar($envase){
        	try{
        		$descripcion= $envase->getDescripcion();
        		$litros= $envase->getLitros();
        		$coeficiente=$envase->getCoeficiente();
        		$con= new Conexion();
        		$conexion =$con->conectar();

        		$sql= "insert into envases values(:idEnvase, :descripcion, :litros, :coeficiente)";
        		$statement= $conexion->prepare($sql);
        		$statement->bindParam(":idEnvase",$idEnvase);
        		$statement->bindParam(":descripcion", $descripcion);
			    $statement->bindParam(":litros", $litros);
			    $statement->bindParam(":coeficiente",$coeficiente);
			    $statement->execute();

			    $message = "Guardado exitosamente!";
			    echo "<script type='text/javascript'>alert('$message');</script>";
        	}catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		    }
		    $con = null; 
        }

        public function listar() {
			$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from envases";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;		
	   }


	   	public function eliminar($idEnvase) {
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from envases where idEnvase = :idEnvase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->execute();

			$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}

		public function modificar($envase,$idEnvase) {
		try {
			
			$idEnvase = $envase->getIdEnvase();
			$descripcion = $envase->getDescripcion();
			$litros = $envase->getLitros();
			$coeficiente = $envase->getCoeficiente();
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update envases set descripcion = :descripcion, litros = :litros, coeficiente = :coeficiente where idEnvase = :idEnvase";
			$statement = $conexion->prepare($sql);

			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->bindParam(':descripcion', $descripcion);
			$statement->bindParam(':litros', $litros);
			$statement->bindParam(':coeficiente',$coeficiente);
			$statement->execute();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}
		
		public function buscar($idCerveza){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			 //"select fk_idCerveza from envasesxcerveza where idCerveza = :idCerveza";
			 $sql ="select fk_idEnvase FROM envasesxcerveza where fk_idCerveza = :idCerveza ";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->execute();
			$resultado = $statement->fetchAll();
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
			$sql = "select * from envases order by idEnvase desc limit 1";

			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
		
	}

	public function buscarCuenta($email){
		
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			 //"select fk_idCerveza from envasesxcerveza where idCerveza = :idCerveza";
			 $sql ="select * FROM usuario where email = :email ";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;

	}



	}			

















 ?>