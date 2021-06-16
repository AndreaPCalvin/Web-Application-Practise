<?php
namespace es\fdi\ucm\aw;
/**
 * esta clase contiene los atributos de la tabla usuario
 */
class TOComentario
{
	private $idComentario;
	private $idComentarioPadre;
	private $texto;
	private $idUsuario;
	private $idPelicula;
	private $fecha;
	function __construct() {
		$idComentario = '';
		$idComentarioPadre = '';
		$texto = '';
		$idUsuario = '';
		$idPelicula = 0;
		$fecha = '';
	}

	public function getidComentario() {
		return $this->idComentario;
	}

	public function getidComentarioPadre() {
		return $this->idComentarioPadre;
	}

	public function gettexto() {
		return $this->texto;
	}

	public function getidUsuario() {
		return $this->idUsuario;
	}

	public function getidPelicula() {
		return $this->idPelicula;
	}

	public function getfecha() {
		return $this->fecha;
	}

	public function setidComentario($_idComentario) {
		$this->idComentario = $_idComentario;
	}

	public function setidComentarioPadre($_idComentarioPadre) {
		$this->idComentarioPadre = $_idComentarioPadre;
	}

	public function settexto($_texto) {
		$this->texto = $_texto;
	}

	public function setidUsuario($_idUsuario) {
		$this->idUsuario = $_idUsuario;
	}

	public function setidPelicula($_idPelicula) {
		$this->idPelicula = $_idPelicula;
	}

	public function setfecha($_fecha) {
		$this->fecha = $_fecha;
	}

}

?>