<?php
namespace es\fdi\ucm\aw;

 class TOValoracion{
 	private $idValoracion;
	private $valoracion;
	private $idPelicula;
	private $idUsuario;
 
	public function __construct(){
		$idValoracion = "";
		$valoracion = "";
		$idPelicula = "";
		$idUsuario = "";
	}
	public function getIdValoracion(){
		return $this->idValoracion;
	}
	public function setIdValoracion($idValoracion){
		$this->idValoracion = $idValoracion;
	}
	public function getValoracion(){
		return $this->valoracion;
	}
	public function setValoracion($valoracion){
		$this->valoracion = $valoracion;
	}

	public function getIdPelicula(){
		return $this->idPelicula;
	}
	public function setIdPelicula($idPelicula){
		$this->idPelicula = $idPelicula;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
 }
?>