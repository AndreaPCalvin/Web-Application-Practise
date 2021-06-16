<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAOActuaciones
{
	public static function create($actuacion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$id_actor = $actuacion->getId_actor();
		$id_pelicula = $actuacion->getId_pelicula();
		$personaje = $actuacion->getPersonaje();
		$sql = sprintf("INSERT into actuacion (id_actor, id_pelicula, personaje) values('%d', '%s', '%s')"
			, $conn->real_escape_string($id_actor)
			, $conn->real_escape_string($id_pelicula)
			, $conn->real_escape_string($personaje)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($id_actor, $id_pelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM actuacion WHERE id_actor = '%d' AND id_pelicula = '%s'"
			, $conn->real_escape_string($id_actor)
			, $conn->real_escape_string($id_pelicula)	
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$fila = $resultado->fetch_assoc();
			$act = new TOActuaciones();
			$act->setId_actor($fila['id_actor']);
			$act->setId_pelicula($fila['id_pelicula']);
			$act->setPersonaje($fila['personaje']);
		}
		return $act;	
	}

	public static function update($actuacion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$id_actor = $actuacion->getId_actor();
		$id_pelicula = $actuacion->getId_pelicula();
		$personaje = $actuacion->getPersonaje();
		$sql = sprintf("UPDATE actuacion set id_actor = '%d', id_pelicula='%s', personaje='%s' where id_actor='%d'"
			, $conn->real_escape_string($id_actor)
			, $conn->real_escape_string($id_pelicula)
			, $conn->real_escape_string($personaje)			
			, $conn->real_escape_string($id_actor)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	public static function listar($id_Pelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM actuacion WHERE id_pelicula = '%s'"
			, $conn->real_escape_string($id_Pelicula)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			while($fila = $resultado->fetch_assoc()){
				$act = new TOActuaciones();
				 $act->setId_actor($fila['id_actor']);
				 $act->setId_pelicula($fila['id_pelicula']);
				 $act->setPersonaje($fila['personaje']);
				 $arrayAct[$fila['id_actor']] = $act;
			}
		}
		return $arrayAct;	
	}
	public static function deleteActor($id_actor){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM actuacion WHERE id_actor = '%d'"
			, $conn->real_escape_string($id_actor)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	public static function deletePelicula($id_pelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE * FROM actuacion WHERE id_pelicula = '%s'"
			, $conn->real_escape_string($id_pelicula)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
}

?>