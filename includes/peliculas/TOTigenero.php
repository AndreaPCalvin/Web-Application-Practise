<?php
namespace es\fdi\ucm\aw;
 class TOtigenero {
 private $idTiGenero;
 private $generoPelicula;
 private $idGenero;

 
	public function __construct(){
		
		 $idTiGenero = "";
		 $generoPelicula = "";
		 $idGenero = "";
	}

	public function getIdTiGenero(){
		return $this->idTiGenero;
	}

	public function setIdTiGenero($tiGenero){
		$this->idTiGenero = $tiGenero;
	}

	public function getGeneroPelicula(){
		return $this->generoPelicula;
	}

	public function setGeneroPelicula($genero){
		$this->generoPelicula = $genero;
	}

	public function getIdGenero(){
		return $this->idGenero;
	}

	public function setIdGenero($id){
		$this->idGenero = $id;
	}
 }
?>