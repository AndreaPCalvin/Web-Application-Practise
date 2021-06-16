<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAOComentario
{
	public static function create($comentario) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$idComentario = $comentario->getidComentario();
		$idComentarioPadre = $comentario->getidComentarioPadre();
		$texto = $comentario->gettexto();
		$idUsuario = $comentario->getidUsuario();
		$idPelicula = $comentario->getidPelicula();
		$fecha = $comentario->getfecha();

		$sql = sprintf("insert into comentario (idComentarioPadre, texto, idUsuario, idPelicula) values('%d', '%s', '%s', '%s')"
		, $conn->real_escape_string($idComentarioPadre)
		, $conn->real_escape_string($texto)
		, $conn->real_escape_string($idUsuario)
		, $conn->real_escape_string($idPelicula));

		if(!$resultado = $conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function read($idComentario) {

		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

		$sql=sprintf("select * from comentario where idComentario='%d'", $conn->real_escape_string($idComentario));
		$resultado = $conn->query($sql);

		if ($resultado->num_rows == 0)
			return NULL;

		$datos = $resultado->fetch_assoc();

		$comentario = new TOComentario();

		$comentario->setidComentario($datos['idComentario']);
		$comentario->setidComentarioPadre($datos['idComentarioPadre']);
		$comentario->settexto($datos['texto']);
		$comentario->setidUsuario($datos['idUsuario']);
		$comentario->setidPelicula($datos['idPelicula']);
		$comentario->setfecha($datos['fecha']);

		return $comentario;
	}

	public static function update($comentario) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$idComentario = $comentario->getidComentario();
		$idComentarioPadre = $comentario->getidComentarioPadre();
		$texto = $comentario->gettexto();
		$idUsuario = $comentario->getidUsuario();
		$idPelicula = $comentario->getidPelicula();
		$fecha = $comentario->getfecha();
		$sql = sprintf("update comentario set idComentario='%s', idComentarioPadre='%s', texto='%s', idUsuario='%s', idPelicula='%d', fecha='%s' where idComentario='%s'"
		, $conn->real_escape_string($idComentario)
		, $conn->real_escape_string($idComentarioPadre)
		, $conn->real_escape_string($texto)
		, $conn->real_escape_string($idUsuario)
		, $conn->real_escape_string($idPelicula)
		, $conn->real_escape_string($fecha)
		, $conn->real_escape_string($idComentario));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function delete($idComentario) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$sql = sprintf("delete from comentario where idComentario='%s'"
		, $conn->real_escape_string($idComentario));

		if(!$conn->query($sql)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public static function readComentariosPelicula($idComentarioPadre, $idPelicula) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
	
		$sql = sprintf("select * from comentario where idComentarioPadre = '%s' and idPelicula = '%s' order by idComentario desc "
                , $conn->real_escape_string($idComentarioPadre)
                , $conn->real_escape_string($idPelicula)
				);
		$resultado = $conn->query($sql);
	
		if ($resultado->num_rows == 0)
			return NULL;
	
		while($datos = $resultado->fetch_assoc()){

			$comentario = new TOComentario();
	
			$comentario->setidComentario($datos['idComentario']);
			$comentario->setidComentarioPadre($datos['idComentarioPadre']);
			$comentario->settexto($datos['texto']);
			$comentario->setidUsuario($datos['idUsuario']);
			$comentario->setidPelicula($datos['idPelicula']);
			$comentario->setfecha($datos['fecha']);
			$listaComentarios[] = $comentario;
		}
	
		return $listaComentarios;
	}

	public static function readRespuestas($idComentarioPadre) {

		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
	
		$sql=sprintf("select * from comentario where idComentarioPadre='%d'", $conn->real_escape_string($idComentarioPadre));
		$resultado = $conn->query($sql);
	
		if ($resultado->num_rows == 0)
			return NULL;
	
		while($datos = $resultado->fetch_assoc()){

			$comentario = new TOComentario();
	
			$comentario->setidComentario($datos['idComentario']);
			$comentario->setidComentarioPadre($datos['idComentarioPadre']);
			$comentario->settexto($datos['texto']);
			$comentario->setidUsuario($datos['idUsuario']);
			$comentario->setidPelicula($datos['idPelicula']);
			$comentario->setfecha($datos['fecha']);
			$listaComentarios[] = $comentario;
		}
	
		return $listaComentarios;
	}

}

?>