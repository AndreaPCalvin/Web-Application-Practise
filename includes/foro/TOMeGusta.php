<?php
namespace es\fdi\ucm\aw;
 class TOMeGusta {
 private $idEvento;
 private $idUsuario;

	public function __construct(){
	}
	public function getIdEvento(){
		return $this->idEvento;
	}
	public function setIdEvento($idEvento){
		$this->idEvento = $idEvento;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	
 }
?>