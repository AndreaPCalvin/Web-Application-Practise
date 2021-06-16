<?php

namespace es\fdi\ucm\aw;


class DAOValoracion {
	
	public static function create($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();		

		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idPelicula = $tValoracion->getIdPelicula();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql = sprintf("INSERT into valoracion (valoracion, idPelicula, idUsuario)values('%d', '%s', '%s')"
		, $conn->real_escape_string($valoracion)
		, $conn->real_escape_string($idPelicula)
		, $conn->real_escape_string($idUsuario)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function read($idValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql = sprintf("SELECT * FROM valoracion WHERE idValoracion = '%d'"
			, $conn->real_escape_string($idValoracion)
		);
		$resultado = $conn->query($sql);
		if ($resultado->num_rows == 0){
			return NULL;
		}
		else{
			$res = $resultado->fetch_assoc();
			$tValoracion = new TOValoracion();
			$tValoracion->setIdValoracion($res['idValoracion']);
			$tValoracion->setValoracion($res['valoracion']);
			$tValoracion->setIdPelicula($res['idPelicula']);
			$tValoracion->setIdUsuario($res['idUsuario']);
		}
		return $tValoracion;		
	}

	public static function update($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idPelicula = $tValoracion->getIdPelicula();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql = sprintf("UPDATE valoracion set idValoracion = '%d', valoracion='%d', idPelicula='%s', idUsuario='%s' where idValoracion='%d'"
			, $conn->real_escape_string($idValoracion)
			, $conn->real_escape_string($valoracion)
			, $conn->real_escape_string($idPelicula)
			, $conn->real_escape_string($idUsuario)
			, $conn->real_escape_string($idValoracion)
		);
		if($conn->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function delete($idValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$sql = sprintf("DELETE FROM valoracion WHERE idValoracion = '%d'"
			, $conn->real_escape_string($idValoracion)
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
	public static function comparar($tValoracion){
				$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();	
		$status = 1; 
		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idPelicula = $tValoracion->getIdPelicula();
		$idUsuario = $tValoracion->getIdUsuario();
	    $sql = sprintf("SELECT * FROM valoracion WHERE idUsuario = '%s' AND idPelicula = '%s'"
	        , $conn->real_escape_string($idUsuario)
	        , $conn->real_escape_string($idPelicula)
	        ); 
	    $result = $conn->query($sql); 
	     
	    if($result->num_rows > 0){ 
	        $status = 2; 
	        $sql = sprintf("UPDATE valoracion SET valoracion.valoracion = '%d' WHERE idUsuario = '%s' AND idPelicula = '%s'"
	            , $conn->real_escape_string($valoracion)  
	            , $conn->real_escape_string($idUsuario)
	            , $conn->real_escape_string($idPelicula)
	            ); 
	        $conn->query($sql); 
	    }
	    return $status;
	}
	public static function media($tValoracion){
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();	
		$idValoracion = $tValoracion->getIdValoracion();
		$valoracion = $tValoracion->getValoracion();
		$idPelicula = $tValoracion->getIdPelicula();
		$idUsuario = $tValoracion->getIdUsuario();

		$sql =  sprintf("SELECT * FROM valoracion WHERE idPelicula = '%s'"
        ,$conn->real_escape_string($idPelicula)
        );
        $rows = $conn->query($sql);
        $cantValoradas = $rows->num_rows;

        $sql =  sprintf("SELECT SUM(valoracion.valoracion) AS total FROM valoracion WHERE idPelicula = '%s'"
        ,$conn->real_escape_string($idPelicula)
        );
        $resultado = $conn->query($sql);
        $arrayT = $resultado->fetch_assoc();
        $total = $arrayT['total'];
        $media = $total / $cantValoradas;

        $sql =  sprintf("UPDATE pelicula SET puntuacion = '%f' WHERE idPelicula = '%s'"
             ,$conn->real_escape_string($media)
             ,$conn->real_escape_string($idPelicula)
             );
        $conn->query($sql);
        return $media;
	}
}

?>