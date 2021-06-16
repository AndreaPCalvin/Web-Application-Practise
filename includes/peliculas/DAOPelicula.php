<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAOPelicula
{
	
	public static function create($pelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$idPelicula = $pelicula->getIdPelicula();
		$titulo = $pelicula->getTitulo();
		$descripcion = $pelicula->getDescripcion();
		$genero = $pelicula->getGenero();
		$director = $pelicula->getDirector();
		$anio = $pelicula->getAnio();
		$puntuacion = $pelicula->getPuntuacion();
		$urlTrailer = $pelicula->getUrlTrailer();
		$urlImagen = $pelicula->getUrlImagen();
		$urlPelicula = $pelicula->getUrlPelicula();

		$sql = sprintf("INSERT into pelicula (idPelicula, titulo, descripcion, anio, genero, director, puntuacion, urlTrailer, urlImagen, urlPelicula)values('%s', '%s', '%s', '%d', '%d', '%s', '%d', '%s', '%s', '%s')"
		, $conn->real_escape_string($idPelicula)
		, $conn->real_escape_string($titulo)
		, $conn->real_escape_string($descripcion)
		, $conn->real_escape_string($anio)
		, $conn->real_escape_string($genero)
		, $conn->real_escape_string($director)
		, $conn->real_escape_string($puntuacion)
		, $conn->real_escape_string($urlTrailer)
		, $conn->real_escape_string($urlImagen)
		, $conn->real_escape_string($urlPelicula));

		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($id){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM pelicula WHERE idPelicula = '%s'"
			, $conn->real_escape_string($id)	
			);
		$resultado = $conn->query($sql);
		
		if ($resultado->num_rows == 0){
			return NULL;
		}

		 $p = new TOPelicula();
		 $fila = $resultado->fetch_assoc();
		 $p->setIdPelicula($fila['idPelicula']);
		 $p->setTitulo($fila['titulo']);
		 $p->setDescripcion($fila['descripcion']);
		 $p->setGenero($fila['genero']);
		 $p->setDirector($fila['director']);
		 $p->setAnio($fila['anio']);
		 $p->setPuntuacion($fila['puntuacion']);
		 $p->setUrlTrailer( $fila['urlTrailer']);
		 $p->setUrlImagen($fila['urlImagen']);
		 $p->setUrlPelicula($fila['urlPelicula']);
		
		return $p;	
	}

	public static function update($pelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$idPelicula = $pelicula->getIdPelicula();
		$titulo = $pelicula->getTitulo();
		$descripcion = $pelicula->getDescripcion();
		$genero = $pelicula->getGenero();
		$director = $pelicula->getDirector();
		$anio = $pelicula->getAnio();
		$puntuacion = $pelicula->getPuntuacion();
		$urlTrailer = $pelicula->getUrlTrailer();
		$urlImagen = $pelicula->getUrlImagen();
		$urlPelicula = $pelicula->getUrlPelicula();

		$sql = sprintf("UPDATE pelicula set idPelicula = '%s', titulo='%s', descripcion='%s', anio='%d', genero='%d', director='%s', puntuacion='%d', urlTrailer='%s', urlImagen='%s', urlPelicula='%s' WHERE idPelicula='%s'"
		, $conn->real_escape_string($idPelicula)
		, $conn->real_escape_string($titulo)
		, $conn->real_escape_string($descripcion)
		, $conn->real_escape_string($anio)
		, $conn->real_escape_string($genero)
		, $conn->real_escape_string($director)
		, $conn->real_escape_string($puntuacion)
		, $conn->real_escape_string($urlTrailer)
		, $conn->real_escape_string($urlImagen)
		, $conn->real_escape_string($urlPelicula)
		, $conn->real_escape_string($idPelicula));
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idPelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM pelicula WHERE idPelicula = '%s'"
			, $conn->real_escape_string($idPelicula)	
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function listarPeliculas(){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM pelicula ");
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0){
			return NULL;
		}

		while($fila = $resultado->fetch_assoc()){
		$p = new TOPelicula();
		 $p->setIdPelicula($fila['idPelicula']);
		 $p->setTitulo($fila['titulo']);
		 $p->setDescripcion($fila['descripcion']);
		 $p->setGenero($fila['genero']);
		 $p->setDirector($fila['director']);
		 $p->setAnio($fila['anio']);
		 $p->setPuntuacion($fila['puntuacion']);
		 $p->setUrlTrailer( $fila['urlTrailer']);
		 $p->setUrlImagen($fila['urlImagen']);
		 $p->setUrlPelicula($fila['urlPelicula']);
		$listaPeliculas[] = $p;
		}
		return $listaPeliculas;
	}
	public static function listarPeliculaxGenero($tipo){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
    	$sql = sprintf("SELECT * FROM genero JOIN tigenero ON genero.idGenero = tigenero.idGenero JOIN pelicula ON pelicula.genero = tigenero.generoPelicula WHERE genero.tipo = '%s'"
    		, $conn->real_escape_string($tipo)
    	);
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0){
			return NULL;
		}

		while($fila = $resultado->fetch_assoc()){
		$p = new TOPelicula();
		 $p->setIdPelicula($fila['idPelicula']);
		 $p->setTitulo($fila['titulo']);
		 $p->setDescripcion($fila['descripcion']);
		 $p->setGenero($fila['genero']);
		 $p->setDirector($fila['director']);
		 $p->setAnio($fila['anio']);
		 $p->setPuntuacion($fila['puntuacion']);
		 $p->setUrlTrailer( $fila['urlTrailer']);
		 $p->setUrlImagen($fila['urlImagen']);
		 $p->setUrlPelicula($fila['urlPelicula']);
		$listaPeliculas[] = $p;
		}
		return $listaPeliculas;
	}
	
	public static function listarPeliculasPorNombre($nombre){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nombreConsulta = $conn->real_escape_string($nombre);
		$sql = "SELECT * FROM pelicula WHERE titulo LIKE '%$nombreConsulta%'";
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0){
			return NULL;
		}

		while($fila = $resultado->fetch_assoc()){
		$p = new TOPelicula();
		 $p->setIdPelicula($fila['idPelicula']);
		 $p->setTitulo($fila['titulo']);
		 $p->setDescripcion($fila['descripcion']);
		 $p->setGenero($fila['genero']);
		 $p->setDirector($fila['director']);
		 $p->setAnio($fila['anio']);
		 $p->setPuntuacion($fila['puntuacion']);
		 $p->setUrlTrailer( $fila['urlTrailer']);
		 $p->setUrlImagen($fila['urlImagen']);
		 $p->setUrlPelicula($fila['urlPelicula']);
		$listaPeliculas[] = $p;
		}
		return $listaPeliculas;
	}

}

?>