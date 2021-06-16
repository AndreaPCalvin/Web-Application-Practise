<?php
namespace es\fdi\ucm\aw;
 class TOAbono{
 	private $tipoAbono;
	private $coste;
	private $duracion;
 
	public function __construct(){
		$tipoAbono = "";
		$coste = "";
		$duracion = "";
	}
	public function getTipoAbono(){
		return $this->tipoAbono;
	}
	public function setTipoAbono($tipoAbono){
		$this->tipoAbono = $tipoAbono;
	}
	public function getCoste(){
		return $this->coste;
	}
	public function setCoste($coste){
		$this->coste = $coste;
	}

	public function getDuracion(){
		return $this->duracion;
	}
	public function setDuracion($duracion){
		$this->duracion = $duracion;
	}
 }
?>