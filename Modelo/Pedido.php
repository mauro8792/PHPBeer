<?php namespace Modelo; 
	
	class Pedido
	{	
		private $idPedido;
		private $idCliente;
		private $fechaPedido;
		private $horaPedido;
		private $idSucursal;
		private $lineaPedido = array();
		
		public function __construct($idCliente='',$fechaPedido='',$horaPedido='',$idSucursal='')
		{
			
			$this->setFechaPedido($fechaPedido);
			$this->setHoraPedido($horaPedido);
		}

		public function getFechaPedido(){
			return $this->fechaPedido;
		}

		public function setFechaPedido($fechaPedido){
			$this->fechaPedido = $fechaPedido;   
		}
		public function getHoraPedido(){
			return $this->direccion;
		}

		public function setHoraPedido($horaPedido){
			$this->horaPedido = $horaPedido;   
		}
		public function setIdPedido($idPedido){
			$this->idPedido=$idPedido;
		}
		public function getIdPedido(){
			return $this->idPedido;

		}

		public function listar(){
			return $this;
		}

		public function agregarLineaPedido($lnPedido){
			
			array_push($this->lineaPedido, $lnPedido);	
		
			
		}

		public function devolverLineaPedido(){
			return $this->lineaPedido;
		}

		public function setLineaPedido($linea){
			if(!is_null($linea)){
				$this->lineaPedido = $linea;
			}
		}

	}







 ?>