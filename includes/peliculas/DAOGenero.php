<?php
namespace es\fdi\ucm\aw;
/**
 * Solo se incluye la funcion list y read ya que son las unicas que se van a usar de momento
 */

class DAOGenero {	
	public static function createGenero($genero){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$tipo = $genero->getTipo();
		$idGenero = $genero->getidGenero();
   		$sql = sprintf("INSERT into genero(tipo) values('%s')" 
   			, $conn->real_escape_string($tipo));
  		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	
	
    public static function readGenero($idPelicula){
    	$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM pelicula JOIN tigenero ON pelicula.genero = tigenero.generoPelicula JOIN genero ON tigenero.idGenero = genero.idGenero WHERE pelicula.idPelicula = '%s'"
    			, $conn->real_escape_string($idPelicula));
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
		while($fila = $resultado->fetch_assoc()){
			$generos[] = $fila['tipo'];
		}
	return $generos;
    }
    public static function listarGeneros(){
    	$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM genero");
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
    	while($fila = $resultado->fetch_assoc()){
			$generos[] = $fila['tipo'];
		}
		return $generos;
	}
	
	public static function read($idGenero){
    	$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM genero WHERE idGenero = %d"
    			, $conn->real_escape_string($idGenero));
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
		$datos = $resultado->fetch_assoc();
		$genero = new TOGenero();
		$genero->setIdGenero($datos['idGenero']);
		$genero->setTipo($datos['tipo']);
	return $genero;
    }

	public static function list(){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM genero");
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
    	while($fila = $resultado->fetch_assoc()){
			$genero = new TOGenero();
			$genero->setIdGenero($fila['idGenero']);
			$genero->setTipo($fila['tipo']);
			$generos[] = $genero;
		}
		return $generos;
	}

	public static function comprobarGeneroPelicula($genero, $idPelicula){
    	$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM pelicula JOIN tigenero ON pelicula.genero = tigenero.generoPelicula JOIN genero ON tigenero.idGenero = genero.idGenero WHERE pelicula.idPelicula = '%s'"
    			, $conn->real_escape_string($idPelicula));
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
		$comprobacion = false;
		while(($fila = $resultado->fetch_assoc()) && !$comprobacion){
			$comprobacion = $fila['idGenero'] == $genero;
		}

	return $comprobacion;
	}
	
	public static function getNextIdGeneroPelicula(){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT MAX(generoPelicula) FROM tigenero");
		$resultado = $conn->query($sql);
		$dato = $resultado->fetch_assoc();
		$i = intval($dato['MAX(generoPelicula)']) + 1;
		  
		
		return $i;
	  }

}

?>