<?php
namespace es\fdi\ucm\aw;
/**
 * esta clase contiene los atributos de la tabla usuario
 */
class TORespuesta {
	private $idRespuesta ;
	private $contenido;
	private $fecha;
	private $borrado;
	private $id_tema;
	private $escritor;


	function __construct() {
		$idRespuesta = '';
		$contenido = '';
		$fecha = '';
		$borrado = '';
		$id_tema = '';
		$escritor = '';
	}


	public function getidRespuesta() {
		return $this->idRespuesta;
	}

	public function setidRespuesta($_idRespuesta) {
		$this->idRespuesta = $_idRespuesta;
	}

	public function getcontenido() {
		return $this->contenido;
	}

	public function setcontenido($_contenido) {
		$this->contenido = $_contenido;
	}

	public function getfecha() {
		return $this->fecha;
	}

	public function setfecha($_fecha) {
		$this->fecha = $_fecha;
	}

	public function getborrado(){
		return $this->borrado;
	}
	public function setborrado($_borrado){
		$this->borrado = $_borrado;
	}

	public function getid_tema() {
		return $this->id_tema;
	}

	public function setid_tema($_id_tema) {
		$this->id_tema = $_id_tema;
	}

	public function getescritor(){
		return $this->escritor;
	}
	public function setescritor($_escritor){
		$this->escritor = $_escritor;
	}
	
}

?>
