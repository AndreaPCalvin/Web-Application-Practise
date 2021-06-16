<?php
namespace es\fdi\ucm\aw;
 class TOMiembro {


 private $id_usuario;
 private $id_grupo;
 private $fecha_union;
 private $rol;

 
	public function __construct(){
		 $id_usuario = "";
		 $id_grupo = "";
		 $fecha_union = "";
		 $rol = "";
	}

	public function getid_usuario(){
		return $this->id_usuario;
	}
	public function setid_usuario($_id_usuario){
		$this->id_usuario = $_id_usuario;
	}

	public function getid_grupo(){
		return $this->id_grupo;
	}
	public function setid_grupo($_id_grupo){
		$this->id_grupo = $_id_grupo;
	}


	public function getfecha_union(){
		return $this->fecha_union;
	}
	public function setfecha_union($_fecha_union){
		$this->fecha_union = $_fecha_union;
	}

	public function getrol(){
		return $this->rol;
	}
	public function setrol($_rol){
		$this->rol = $_rol;
	}

}