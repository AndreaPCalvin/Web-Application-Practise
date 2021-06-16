<?php
namespace es\fdi\ucm\aw;
 class TOActuaciones {
 private $id_actor;
 private $id_pelicula;
 private $personaje;
 
	public function __construct(){
		$id_actor = "";
		$id_pelicula = "";
		$personaje = "";
	}
	public function getId_actor(){
		return $this->id_actor;
	}
	public function setId_actor($id_actor){
		$this->id_actor = $id_actor;
	}
	public function getId_pelicula(){
		return $this->id_pelicula;
	}
	public function setId_pelicula($id_pelicula){
		$this->id_pelicula = $id_pelicula;
	}
	public function getPersonaje(){
		return $this->personaje;
	}
	public function setPersonaje($personaje){
		$this->personaje = $personaje;
	}
 }
?>