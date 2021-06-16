<?php
namespace es\fdi\ucm\aw;
 class TOActor{
 	private $idActor;
	private $nombre;
	private $imagen;
	private $fecha_nacimiento;
	private $nacionalidad;
 
	public function __construct(){
		$idActor = "";
		$nombre = "";
		$imagen = "";
		$fecha_nacimiento = "";
		$nacionalidad = "";
	}
	public function getIdActor(){
		return $this->idActor;
	}
	public function setIdActor($idActor){
		$this->idActor = $idActor;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getImagen(){
		return $this->imagen;
	}
	public function setImagen($imagen){
		$this->imagen = $imagen;
	}
	public function getFecha_nacimiento(){
		return $this->fecha_nacimiento;
	}	
	public function setFecha_nacimiento($fecha_nacimiento){
		$this->fecha_nacimiento = $fecha_nacimiento;
	}
	public function getNacionalidad(){
		return $this->nacionalidad;
	}	
	public function setNacionalidad($nacionalidad){
		$this->nacionalidad = $nacionalidad;
	}
 }
?>