<?php
namespace es\fdi\ucm\aw;
 class TOGrupo {
 
 private $idGrupo;
 private $nombreGrupo;
 private $creadorGrupo;
 private $descripcion;
 private $fecha;
 private $num_miembros;
 private $borrado;
 private $tipo;

 
	public function __construct(){
		 $idGrupo = "";
 		 $nombreGrupo = "";
 		 $creadorGrupo = "";
 		 $descripcion = "";
		 $fecha = "";
		 $num_miembros = "";
		 $borrado = "";
	}

	public function getidGrupo(){
		return $this->idGrupo;
	}
	public function setidGrupo($_idGrupo){
		$this->idGrupo = $_idGrupo;
	}
	public function getnombreGrupo(){
		return $this->nombreGrupo;
	}
	public function setnombreGrupo($_nombreGrupo){
		$this->nombreGrupo = $_nombreGrupo;
	}

	public function getcreadorGrupo(){
		return $this->creadorGrupo;
	}
	public function setcreadorGrupo($_creadorGrupo){
		$this->creadorGrupo = $_creadorGrupo;
	}

	public function getdescripcion(){
		return $this->descripcion;
	}
	public function setdescripcion($_descripcion){
		$this->descripcion = $_descripcion;
	}

	public function getfecha(){
		return $this->fecha;
	}
	public function setfecha($_fecha){
		$this->fecha = $_fecha;
	}

	public function getnum_miembros(){
		return $this->num_miembros;
	}
	public function setnum_miembros($_num_miembros){
		$this->num_miembros = $_num_miembros;
	}

	public function getborrado(){
		return $this->borrado;
	}
	public function setborrado($_borrado){
		$this->borrado = $_borrado;
	}

	public function gettipo(){
		return $this->tipo;
	}
	public function settipo($_tipo){
		$this->tipo = $_tipo;
	}
	
	
 }
?>