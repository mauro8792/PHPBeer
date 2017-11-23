<?php namespace Controladora;


use Modelo\Cuenta as Cuenta;
use Modelo\Usuario as Usuario;
use DAO\CuentaDAO as CuentaDAO;
use DAO\UsuarioDAO as UsuarioDAO;

class loginControlador{

	protected $listacuenta;
	protected $listausuario;
	public $usuario;
	public $cuenta;

	public function __construct(){
		$this->listacuenta = CuentaDAO::getInstance();
		$this->listausuario = UsuarioDAO::getInstance();

	}

	public function index(){

		if(!isset($_SESSION['user'])){
			header('location: login/vistaLogin');
		}else{
			header('location: login/home');
		}
	}

	public function home(){
		require_once ROOT . "Vistas/template.php";
	}

	public function vistaLogin(){
		require_once ROOT . "Vistas/login.php";
	}

	public function vistaRegistro(){
		require_once ROOT . "Vistas/registro.php";
	}


	public function registrar(){

			if (empty($_POST['nombre'])  || empty($_POST['apellido']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['password'])){
					throw new Exception('Complete todos los campos');
			} else{
			
				$nombre		= $_POST['nombre'];
				$apellido	= $_POST['apellido'];
				$direccion	= $_POST['direccion'];
				$telefono	= $_POST['telefono'];
				$email		= $_POST['email'];
				$password   = $_POST['password'];
				$rol		= '';

				$usuario = new usuario($nombre,$apellido,$direccion,$telefono,$email);
				$cuenta = new cuenta($email,$password,$rol);

				//hacer los new y agregar la cuenta al usuario;

		//		$usuario = array(
		//			'nombre' => $nombre,
		//			'apellido' => $apellido,
		//			'direccion' => $direccion,
		//			'telefono' => $telefono,
		//			'email'	=> $email);
		//		$cuenta	 = array(
		//			'email' => $email,
		//			'pass' => $password,
		//			'rol' => $rol);


				$this->listausuario->insertar($usuario);
				$this->listacuenta->insertar($cuenta);

				header('location: ingresar');
				
			}
		}

	public function ingresar(){
		if (isset($_SESSION['user']))
		{
			header('location: home');
			
		}else {
			header('location: vistaLogin');
		}
		

	}

	public function logueo(){

		//if (isset($_POST['login'])){

			if (empty($_POST['email'])  || empty($_POST['password'])){
					throw new Exception('Complete todos los campos');
			} else{
				$email= $_POST['email'];
				$password= $_POST['password'];
				$cuenta = array(
					'email' => $email,
					'password' => $password
					);

				try {
					$user = $this->listacuenta->buscar($cuenta);
					if($user){

						$e = $user[0]['email'];
						$p = $user[0]['pass'];
						$r = $user[0]['rol'];
					

						$_SESSION['user'] = $e;
						$_SESSION['pass'] = $p;
						$_SESSION['rol'] = $r;
				
	
						//$this->index();
						$message = "Usuario Ingresado correctamente!";
						echo "<script type='text/javascript'>alert('$message');</script>";
						require_once ROOT . "/Vistas/template.php";

					}else{
						$message = "cuenta o Contraseña incorrecta!";
						echo "<script type='text/javascript'>alert('$message');</script>";
						require_once ROOT . "/Vistas/login.php";

					}
						
				}catch (PDOException $e) {
						require_once ROOT . "/Vistas/login.php";
				}

				}
		//}
	}


	public function logout(){
			session_destroy();
			
			require_once ROOT . "Vistas/login.php";
		
	}
 
}
?>