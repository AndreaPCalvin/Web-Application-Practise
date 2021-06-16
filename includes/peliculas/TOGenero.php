<?php
namespace es\fdi\ucm\aw;
 class TOGenero{
 	private $tipo;
	private $idGenero;
 
	public function __construct(){
		$tipo = "";
		$idGenero = "";
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getidGenero(){
		return $this->idGenero;
	}
	public function setidGenero($idGenero){
		$this->idGenero = $idGenero;
	}
 }
?>