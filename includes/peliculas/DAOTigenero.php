<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAOTigenero
{
	public static function create($tigenero) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$generoPelicula = $tigenero->getgeneroPelicula();
		$idGenero = $tigenero->getidGenero();

		$sql = sprintf("insert into tigenero(generoPelicula, idGenero) values('%s', '%s')"
		, $conn->real_escape_string($generoPelicula)
		, $conn->real_escape_string($idGenero));

		if(!$resultado = $conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function read($idTigenero) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql=sprintf("select * from tigenero where idTigenero='%s'", $conn->real_escape_string($idTigenero));
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0)
			return NULL;

		$datos = $resultado->fetch_assoc();

		$tigenero = new TOtigenero();

		$tigenero->setidTigenero($datos['idTigenero']);
		$tigenero->setgeneroPelicula($datos['generoPelicula']);
		$tigenero->setidGenero($datos['idGenero']);

		return $tigenero;
	}

	public static function update($tigenero) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$idTigenero = $tigenero->getidTigenero();
		$generoPelicula = $tigenero->getgeneroPelicula();
		$idGenero = $tigenero->getidGenero();
		$sql = sprintf("update tigenero set idTigenero='%s', generoPelicula='%s', idGenero='%s' where idTigenero='%s'"
		, $conn->real_escape_string($idTigenero)
		, $conn->real_escape_string($generoPelicula)
        , $conn->real_escape_string($idGenero)
        
		, $conn->real_escape_string($idTigenero));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function delete($idTigenero) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$sql = sprintf("delete from tigenero where idTigenero='%s'"
		, $conn->real_escape_string($idTigenero));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
    }

    public static function deleteGenerosPeli($generoPelicula) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$sql = sprintf("delete from tigenero where generoPelicula='%s'"
		, $conn->real_escape_string($generoPelicula));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
    }
    
   /*  public static function listGenerosPelicula($generoPelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = sprintf("SELECT * FROM tigenero where generoPelicula=%d"
    , $conn->real_escape_string($generoPelicula));
    	$resultado = $conn->query($sql);
    	if ($resultado->num_rows == 0){
			return NULL;
		}
    	while($fila = $resultado->fetch_assoc()){
			$tigenero = new TOtigenero();

		    $tigenero->setidTigenero($datos['idTigenero']);
		    $tigenero->setgeneroPelicula($datos['generoPelicula']);
		    $tigenero->setidGenero($datos['idGenero']);
			$generos[] = $tigenero;
		}
		return $generos;
    } */
    
}

?>