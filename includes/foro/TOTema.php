<?php
namespace es\fdi\ucm\aw;
 class TOTema {


 
 private $id_grupo;
 private $creador;
 private $idTema;
 private $titulo;
 private $fecha_creacion;
 private $descripcion;
 private $borrado;

 
	public function __construct(){
		 $id_grupo = "";
 		 $creador = "";
 		 $idTema = "";
 		 $titulo = "";
		 $fecha_creacion = "";
		 $descripcion = "";
		 $borrado = "";
	}


	public function getid_grupo(){
		return $this->id_grupo;
	}
	public function setid_grupo($_id_grupo){
		$this->id_grupo = $_id_grupo;
	}
	public function getcreador(){
		return $this->creador;
	}
	public function setcreador($_creador){
		$this->creador = $_creador;
	}

	public function getidTema(){
		return $this->idTema;
	}
	public function setidTema($_idTema){
		$this->idTema = $_idTema;
	}

	public function getdescripcion(){
		return $this->descripcion;
	}
	public function setdescripcion($_descripcion){
		$this->descripcion = $_descripcion;
	}

	public function gettitulo(){
		return $this->titulo;
	}
	public function settitulo($_titulo){
		$this->titulo = $_titulo;
	}

	public function getfecha_creacion(){
		return $this->fecha_creacion;
	}
	public function setfecha_creacion($_fecha_creacion){
		$this->fecha_creacion = $_fecha_creacion;
	}

	public function getborrado(){
		return $this->borrado;
	}
	public function setborrado($_borrado){
		$this->borrado = $_borrado;
	}

}