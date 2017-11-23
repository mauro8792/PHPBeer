<?php namespace Controladora;

if(!isset($_SESSION['user'])){
	header('location: ../login/vistaLogin');
}

Use DAO\CervezaDAOLista as CervezaDAOLista;
use DAO\CervezaDAO as CervezaDAO;
use DAO\EnvaseDAO as EnvaseDAO;
use Modelo\Envase as Envase;
use Modelo\Cerveza as Cerveza;


class cervezaControlador
{
	private $cerveza;
	private $envase;
	private $error;
	
	public function __construct()
	{
		$this->cerveza = CervezaDAO::getInstance();
		$this->envase = EnvaseDAO::getInstance();
		//$this->cerveza = CervezaDAOLista:: getInstance();
	}

	public function index(){
		header("location: Vistas/template.php");
	}

	public function ingresarCerveza(){
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/nuevaCerveza.php";
	}

	public function seleccionEnvases(){

		$cervUltima = $this->cerveza->buscarUltimo();
		$envases = $this->envase-> listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/seleccionEnvases.php";
	}

	public function nueva($nombre,$precioLitro,$descripcion){

		try{
			$imageDirectory = 'Vistas/images/';
			$message = null;
			$file = $imageDirectory . 'sinfoto.png';
			
			if(!file_exists($imageDirectory))
				mkdir($imageDirectory);

			if($_FILES)
			{
				if((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != ''))
				{
					$file = $imageDirectory . basename($_FILES['fileToUpload']['name']);			

					$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
			
					$imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);
					
					if($imageInfo !== false)
					{
						if($_FILES['fileToUpload']['size'] < 5000000) //Menor a 5 MB
						{
							if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file))
							{
		        				$message = "No se pudo subir el archivo";
		        			}	
						}
						else
							$message = "el archivo es demasiado grande";
						}
					else
						$message = "el archivo no es un archivo de imagen";
				}		
			}

			if(!is_null($message)){
				echo "<script type='text/javascript'>alert('$message');</script>";
			}

			$cerv = new Cerveza($nombre,$descripcion,$precioLitro,$file);
			$existe = $this->cerveza->buscarxNombre($nombre);
			if(empty($existe)){
				$this->cerveza->insertar($cerv);
				echo "<script type='text/javascript'>alert('$message');</script>";
				$this->seleccionEnvases();	
			}
			else{
				$message = "ya existe!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$this->ingresarCerveza();
			}
			
		} catch (PDOException $e){
			
			echo $e->getMessage();
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function agregaEnvases($idEnvase,$idCerveza){
		$this->cerveza->insertaEnvase($idEnvase,$idCerveza);
		$this->seleccionEnvases();
	}
	public function listarCliCervezas(){
		$cervezas = $this->cerveza->listar();

		/*for ($i=0; $i <count($cervezas) ; $i++){
			$envase = $this->cerveza->cervEnv($i['idCerveza']);
			for ($j=0; $j <count($envase) ; $j++) {
				echo  $envase[$j][1]; 				
				echo '<br>';
				if($cervezas[$i]['idCerveza'] == $envase[$j]['fk_idCerveza']){
				echo $cervezas[$i]['idCerveza'] . ' - ' . $envase[$j]['descripcion'];
				echo '<br>';				
				}
				

			}


			//var_dump($envase);
			//echo ' envase '.$envase[0][0].'='.$i['idCerveza'].'<br>';
							
		}*/

		
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoCliCerveza.php";
	}
	public function listarCervezas(){
		$cervezas = $this->cerveza->listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoCerveza.php";
	}

	public function modificarCerveza($idCerv){
			
			$cerv = $this->cerveza->buscar($idCerv);
			require_once ROOT . "Vistas/template.php"; 
			require_once ROOT . "Vistas/editarCerveza.php";	
			
		}

	public function editarCerveza($nombre,$precioLitro,$descripcion,$foto,$id){
		
		$cerv = $this->cerveza->buscar($id);

		$imageDirectory = 'Vistas/images/';
		$message = null;
		$file=null;		

			if(!file_exists($imageDirectory))
				mkdir($imageDirectory);

			if($_FILES)
			{
				if((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != ''))
				{
					$file = $imageDirectory . basename($_FILES['fileToUpload']['name']);			

					$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
			
					$imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);
					
					if($imageInfo !== false)
					{	
						if($_FILES['fileToUpload']['size'] < 5000000) //Menor a 5 MB
						{
							if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file))
							{
		        				$message = "No se pudo subir el archivo";
		        			}	
						}
						else
							$message = "el archivo es demasiado grande";
						}
					else
						$message = "el archivo no es un archivo de imagen";
				}		
			}

			if (is_null($file)) {
				$file =  $_POST['foto'];
			}

			if(!is_null($message)){
				echo "<script type='text/javascript'>alert('$message');</script>";
				//$cerv = $this->cerveza->buscar($id);
				//require_once ROOT . "Vistas/template.php";
				//require_once ROOT . "Vistas/editarCerveza.php";	
			}
			else{
				$cerv = new Cerveza($nombre,$descripcion,$precioLitro,$file);

				$this->cerveza->modificar($cerv,$id);
				$this->modifCerEnvases($id);	
				//$cervezas = $this->cerveza->listar();
				//require_once ROOT . "Vistas/template.php";
				//require_once ROOT . "Vistas/listadoCerveza.php";
			}
			

		
	}
	public function modifCerEnvases($idCerveza){

		$cervUltima = $this->cerveza->buscar($idCerveza);
		$envases = $this->envase-> listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/seleccionEnvases.php";
	}

	public function eliminarCerveza($idCerv){
	$idCerveza= null;
	$idCerveza = $idCerv;
	$cerv=$this->cerveza->buscar($idCerveza);
	$estado=1;
	if($cerv['estado']==1){
		$estado = 0;
	}
	$this->cerveza->eliminarLogico($idCerveza,$estado);
	header('location: ../listarCervezas');
	}
	
}
?>