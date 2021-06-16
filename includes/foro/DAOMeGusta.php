<?php
namespace es\fdi\ucm\aw;

class DAOMeGusta
{
	public static function create($meGusta){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("insert into me_gusta(id_evento, apodoUsuario) values('%d', '%s')",
			$conection->real_escape_string($meGusta->getIdEvento()),
			$conection->real_escape_string($meGusta->getIdUsuario())
		);
		return $conection->query($query);
	
	}

	public static function read($meGusta){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("select * from me_gusta where id_evento = '%d' and apodoUsuario = '%s'",
			$conection->real_escape_string($meGusta->getIdEvento()),
			$conection->real_escape_string($meGusta->getIdUsuario())
		);

		return $conection->query($query);	
	}

	public static function delete($meGusta){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("delete from me_gusta where id_evento = '%d' and apodoUsuario = '%s'",
			$conection->real_escape_string($meGusta->getIdEvento()),
			$conection->real_escape_string($meGusta->getIdUsuario())
		);
		return $conection->query($query);
	
	}
	
	public static function getNumLikes($id){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("select * from me_gusta where id_evento = '%d'",
			$conection->real_escape_string($id)
		);
		$result = $conection->query($query);
		  $n = 0;
		  while($row = $result->fetch_assoc()){
			$n = $n + 1;       
		}
      return $n;

    }
	
	public static function listarUsuariosMG($idGrupo){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("select apodoUsuario from me_gusta where id_evento = '%d'",
			$conection->real_escape_string($idGrupo)
		);
		$result = $conection->query($query);
		
		if ($result->num_rows == 0){
			return NULL;
		}

		while($fila = $result->fetch_assoc()){
			$listaUsers[] = $fila['apodoUsuario'];
		}
		return $listaUsers;
		//devuelve apodos (id)
    }

}

?>