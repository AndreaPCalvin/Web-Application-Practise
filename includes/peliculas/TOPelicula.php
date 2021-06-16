<?php
namespace es\fdi\ucm\aw;
 class TOPelicula {
 private $idPelicula;
 private $titulo;
 private $descripcion;
 private $anio;
 private $puntuacion;
 private $urlTrailer;
 private $urlImagen;
 private $urlPelicula;
 private $genero;
 private $director;
 
	public function __construct(){
		$idcula = "";
		$titulo = "";
		$descripcion = "";
		$anio = "";
		$puntuacion = "";
		$urlTrailer = "";
		$urlImagen = "";
		$urlPelicula = "";
		$genero = "";
		$director = "";
	}
	public function getIdPelicula(){
		return $this->idPelicula;
	}
	public function setIdPelicula($idPelicula){
		$this->idPelicula = $idPelicula;
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
	public function getAnio(){
		return $this->anio;
	}
	public function setAnio($anio){
		$this->anio = $anio;
	}
	public function getPuntuacion(){
		return $this->puntuacion;
	}
	public function setPuntuacion($puntuacion){
		$this->puntuacion = $puntuacion;
	}
	public function getUrlTrailer(){
		return $this->urlTrailer;
	}
	public function setUrlTrailer($urlTrailer){
		$this->urlTrailer = $urlTrailer;
	}
	public function getUrlImagen(){
		return $this->urlImagen;
	}
	public function setUrlImagen($urlImagen){
		$this->urlImagen = $urlImagen;
	}
	public function getUrlPelicula(){
		return $this->urlPelicula;
	}	
	public function setUrlPelicula($urlPelicula){
		$this->urlPelicula = $urlPelicula;
	}
	public function getDirector(){
		return $this->director;
	}	
	public function setDirector($director){
		$this->director = $director;
	}
	public function getGenero(){
		return $this->genero;
	}	
	public function setGenero($genero){
		$this->genero = $genero;
	}
 }
?>