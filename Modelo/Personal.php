<?php namespace Modelo;

Use \Modelo\Cuenta as Cuenta;


class Personal
{
	private $legajo;
	private $nombre;
	private $apellido;
	private $direccion;
	private $telefono;
	public $cuenta;

	
	 function __construct($legajo='',$nombre='',$apellido='',$direccion='',$telefono='',Cuenta $cuenta)
	{
		$this->setLegajo($legajo);
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setDireccion($direccion);
		$this->setTelefono($telefono);
		$this->setCuenta($cuenta);
	}

	public function getLegajo()
	{
		return $this->legajo;
	}

	public function setLegajo($legajo)
	{
		$this->legajo = $legajo;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	
	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion= $direccion;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono= $telefono;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getCuenta()
	{
		return $this->$cuenta;
	}

	public function setCuenta(Cuenta $cuenta)
	{
		$this->cuenta = $cuenta;
	}

}