<?php namespace Controladora;

	use DAO\CervezaDAO as CervezaDAO;
	use DAO\EnvaseDAO as EnvaseDAO;
	use DAO\PedidoDAO as PedidoDAO;
	use DAO\LineaPedidoDAO as LineaPedidoDAO;
	use DAO\SucursalDAO as SucursalDAO;


	use Modelo\Cerveza as Cerveza;
	use Modelo\Envase as Envase;
	use Modelo\Pedido as Pedido;
	use Modelo\LineaPedido as LineaPedido;
	use Modelo\Sucursal as Sucursal;
	
	
	class pedidoControlador
	{
		protected $cerveza;
		protected $envase;
		protected $pedido;
		protected $lineaPedido;
		protected $sucursales;

		public function __construct()
		{
			$this->cerveza 		= CervezaDAO::getInstance();
			$this->envase  		= EnvaseDAO::getInstance();
			$this->pedido  		= PedidoDAO::getInstance();
			$this->sucursales   = SucursalDAO::getInstance();
			//$this->lineaPedido  = PedidoDAO::getInstance();	
		}



		public function elegirCerveza(){
			$cervezas=$this->cerveza->listarParaPed();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirCerveza.php";
		}

		public function elegirEnvase($idCerveza){
			
			$cerv = $this->cerveza->buscar($idCerveza);
			$envasesPedido=$this->pedido->buscar($idCerveza);
			$envaseCerv=array();
			$envases= $this->envase->listar();
			for ($i=0; $i < count($envasesPedido); $i++) { 
				foreach ($envases as $j) {
					if($j['idEnvase']==$envasesPedido[$i]['fk_idEnvase']){
						array_push($envaseCerv, $j);
					}
				}
			}
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirEnvase.php";
			
		}


		public function agregarAlCarrito($idEnvase,$cantidad,$idCerveza)
		{
			//$cliente = $this->Usuario->buscar($_SESSION['usuario']);
			//session_unset($_SESSION['pedido']);
			
			

			if(!isset($_SESSION['pedido'])){
				$pedido = new Pedido();
				$cerv = $this->cerveza->buscar($idCerveza);   //array de cervezas
				$env = $this->envase->buscar($idEnvase);	  //array de envases
				$precioxenvase=($cerv['precioLitro'] * $env['litros'])*(1-$env['coeficiente']);
				$precioLn = (($cerv['precioLitro'] * $env['litros'])*$cantidad)*(1-$env['coeficiente']); // falta Coeficiente() 
				
				$idLinea = $this->buscarUltimoIdLinea();
				$idLinea++; 
				$lnPedido = new LineaPedido($cantidad,$precioLn);
				$lnPedido->setPrecioXenvase($precioxenvase);
				$lnPedido->setIdLineaPedido($idLinea);
				$lnPedido->agregarCerveza($cerv);
				$lnPedido->agregarEnvase($env);
				
				$pedido->agregarLineaPedido($lnPedido);

				$_SESSION['pedido'] = $pedido->listar();
			}else{

				$pedido = $_SESSION['pedido'];
				$cerv = $this->cerveza->buscar($idCerveza);   //array de cervezas
				$env = $this->envase->buscar($idEnvase);	  //array de envases
				
				$precioxenvase=($cerv['precioLitro'] * $env['litros'])*(1-$env['coeficiente']);
				$precioLn = (($cerv['precioLitro'] * $env['litros'])*$cantidad)*(1-$env['coeficiente']);
				
				$idLinea= $this->buscarUltimoIdLinea();
				$idLinea++; 
				$lnPedido = new LineaPedido($cantidad,$precioLn);
				$lnPedido->setIdLineaPedido($idLinea);
				$lnPedido->setPrecioXenvase($precioxenvase);
				$lnPedido->agregarCerveza($cerv);
				$lnPedido->agregarEnvase($env);
				
				$pedido->agregarLineaPedido($lnPedido);

				
				
			}

			$this->elegirCerveza();
		}

		public function verPedido(){
			
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			}

			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . 'Vistas/verPedido.php';
		}
		public function buscarUltimoIdLinea(){
			$id=0;
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			
					foreach ($lnPedido as $linea) 
				    {
				    	$id=$linea->getIdLineaPedido();
				    }
				   
				    return $id;
		    }
		}
		public function eliminarDePedido($LineaPedido){
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			
					foreach ($lnPedido as $key => $linea) 
				    {
				    	if($linea->getIdLineaPedido() == $LineaPedido)
				    {
				    	//echo "string" . $linea->getIdLineaPedido();
						unset($lnPedido[$key]);
						//$lnPedido->pisar($linea[$key]);
						$pedido->setLineaPedido($lnPedido);
				    }
				    }
				   

					$_SESSION['pedido'] = $pedido;
		    }
		    $this->verPedido();
		}

		public function elegirSucursal(){
			$sucursales=$this->sucursales->listarAct();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirSucursal.php";
		}
		public function finalizarPedido(){
			//sucursales
			$idSucursal= $_POST['idSucursal'];
			$sucursales=$this->sucursales->buscar($idSucursal);
			// usuario
			$usuario= $_SESSION['user'];
			$cabecera=$this->pedido->buscarCuenta($usuario);
			//pedido
			$pedido= $_SESSION['pedido'];
			$lnPedido =$pedido->devolverLineaPedido();
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/finPedido.php";
		}


}

?>