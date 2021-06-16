<?php
namespace es\fdi\ucm\aw;
 class TORanking {
 private $idEvento;
 private $idUsuario;
 private $nota;

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
	public function getNota(){
		return $this->nota;
	}
	public function setNota($nota){
		$this->nota = $nota;
	}
	
 }
?>