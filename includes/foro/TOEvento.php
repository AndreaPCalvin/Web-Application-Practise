<?php
namespace es\fdi\ucm\aw;
 class TOEvento {
 private $idEvento;
 private $titulo;
 private $descripcion;
 private $fecha;
 private $urlImagen;
 private $ciudad;
 private $pais;
 private $continente;
 private $categoria;
 
	public function __construct(){
		$idEvento = "";
		$titulo = "";
		$descripcion = "";
		$fecha = "";
		$urlImagen = "";
		$ciudad = "";
		$pais = "";
		$continente = "";
		$categoria = "";
	}
	public function getIdEvento(){
		return $this->idEvento;
	}
	public function setIdEvento($idEvento){
		$this->idEvento = $idEvento;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	public function getUrlImagen(){
		return $this->urlImagen;
	}
	public function setUrlImagen($urlImagen){
		$this->urlImagen = $urlImagen;
	}
	public function getCiudad(){
		return $this->ciudad;
	}
	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}
	public function getPais(){
		return $this->pais;
	}
	public function setPais($pais){
		$this->pais = $pais;
	}
	public function getContinente(){
		return $this->continente;
	}
	public function setContinente($continente){
		$this->continente = $continente;
	}
	public function getCategoria(){
		return $this->categoria;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
 }
?>