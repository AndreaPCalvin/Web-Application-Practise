<?php
namespace es\fdi\ucm\aw;


class DAOActor
{
	public static function create($actor){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();		
		$idActor = $actor->getIdActor();
		$nombre = $actor->getNombre();
		$imagen = $actor->getImagen();
		$fecha_nacimiento = $actor->getFecha_nacimiento();
		$nacionalidad = $actor->getNacionalidad();
		$sql = sprintf("INSERT into actores (idActor, nombre, imagen, fecha_nacimiento, nacionalidad)values('%d', '%s', '%s', '%s', '%s')"
		, $conn->real_escape_string($idActor)
		, $conn->real_escape_string($nombre)
		, $conn->real_escape_string($imagen)
		, $conn->real_escape_string($fecha_nacimiento)
		, $conn->real_escape_string($nacionalidad)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($idActor){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM actores WHERE idActor = '%d'"
			, $conn->real_escape_string($idActor)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$actor = new TOActor();
			$actor->setIdActor($res['idActor']);
			$actor->setNombre($res['nombre']);
			$actor->setImagen($res['imagen']);
			$actor->setFecha_nacimiento($res['fecha_nacimiento']);
			$actor->setNacionalidad($res['nacionalidad']);
		}
		return $actor;		
	}

	public static function update($actor){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$idActor = $actor->getIdActor();
		$nombre = $actor->getNombre();
		$imagen = $actor->getImagen();
		$fecha_nacimiento = $actor->getFecha_nacimiento();
		$nacionalidad = $actor->getNacionalidad();
		$sql = sprintf("UPDATE actores set idActor = '%d', nombre='%s', imagen='%s', fecha_nacimiento='%s', nacionalidad='%s'where idActor='%d'"
			, $conn->real_escape_string($idActor)
			, $conn->real_escape_string($nombre)
			, $conn->real_escape_string($imagen)
			, $conn->real_escape_string($fecha_nacimiento)
			, $conn->real_escape_string($nacionalidad)
			, $conn->real_escape_string($idActor)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idActor){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM actores WHERE idActor = '%d'"
			, $conn->real_escape_string($idActor)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}
	public static function listar($idPelicula){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("SELECT * FROM actores JOIN actuacion ON actores.idActor = actuacion.id_actor WHERE id_pelicula = '%s'"
			, $conn->real_escape_string($idPelicula)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			while($fila = $resultado->fetch_assoc()){
				$actor = new TOActor();
				$actor->setIdActor($fila['idActor']);
				$actor->setNombre($fila['nombre']);
				$actor->setImagen($fila['imagen']);
				$actor->setFecha_nacimiento($fila['fecha_nacimiento']);
				$actor->setNacionalidad($fila['nacionalidad']);
				$listaActores[] = $actor;
			}
		}
		return $listaActores;
	}
}

?>