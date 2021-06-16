<?php
namespace es\fdi\ucm\aw;

class DAORanking
{
	public static function create($ranking){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("insert into ranking(apodoUser, idEvento, nota) values('%s', '%s', '%s')",
			$conection->real_escape_string($ranking->getIdUsuario()),
			$conection->real_escape_string($ranking->getIdEvento()),
			$conection->real_escape_string($ranking->getNota())
		);
		return $conection->query($query);
	
	}

	public static function read($ranking){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("select * from ranking where idEvento = '%d' and apodoUser = '%s'",
			$conection->real_escape_string($ranking->getIdEvento()),
			$conection->real_escape_string($ranking->getIdUsuario())
		);

		return $conection->query($query);	
	}
	
	public static function update($ranking){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("UPDATE ranking SET nota=%d WHERE idEvento = '%d' and apodoUser = '%s'",
			$conection->real_escape_string($ranking->getNota()),
			$conection->real_escape_string($ranking->getIdEvento()),
			$conection->real_escape_string($ranking->getIdUsuario())
		);

		return $conection->query($query);
	}
	
	public static function getNotaMedia($idEvento){
		$aplication = Aplicacion::getSingleton();
        $conection = $aplication->conexionBd();

		$query = sprintf("select avg(nota) as media from ranking group by idEvento having idEvento = '%d'",
			$conection->real_escape_string($idEvento)
		);
		$result = $conection->query($query);
		$a=0;
		while($row = $result->fetch_assoc()) {
			$a = $row["media"];
		}
		return $a;
    }

}

?>