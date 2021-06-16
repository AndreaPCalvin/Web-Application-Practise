<?php
namespace es\fdi\ucm\aw;
/**
 * esta clase contiene los atributos de la tabla usuario
 */
class TOUsuario
{
	private $apodo;
	private $nombre;
	private $apellidos;
	private $email;
	private $contrasena;
	private $tipoAbono;
	private $inicioAbono;
	private $rol;
	private $urlFoto;
	function __construct() {
		$apodo = '';
		$nombre = '';
		$apellidos = '';
		$email = '';
		$contrasena = '';
		$tipoAbono = '';
		$inicioAbono = '';
		$rol = '';
		$urlFoto = '';
	}

	public function getApodo() {
		return $this->apodo;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getApellidos() {
		return $this->apellidos;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getContrasena() {
		return $this->contrasena;
	}

	public function getTipoAbono() {
		return $this->tipoAbono;
	}

	public function getInicioAbono() {
		return $this->inicioAbono;
	}

	public function getRol() {
		return $this->rol;
	}

	public function geturlFoto(){
		return $this->urlFoto;
	}

	public function setApodo($_apodo) {
		$this->apodo = $_apodo;
	}

	public function setNombre($_nombre) {
		$this->nombre = $_nombre;
	}

	public function setApellidos($_apellidos) {
		$this->apellidos = $_apellidos;
	}

	public function setEmail($_email) {
		$this->email = $_email;
	}

	public function setContrasena($_contrasena) {
		$this->contrasena = $_contrasena;
	}

	public function setTipoAbono($_tipoAbono) {
		$this->tipoAbono = $_tipoAbono;
	}

	public function setInicioAbono($_inicioAbono) {
		$this->inicioAbono = $_inicioAbono;
	}

	public function setRol($_rol) {
		$this->rol = $_rol;
	}
	public function seturlFoto($_urlFoto){
		$this->urlFoto = $_urlFoto;
	}

}

?>