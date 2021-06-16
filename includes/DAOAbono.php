<?php
namespace es\fdi\ucm\aw;
/**
 * Solo se incluye la funcion list y read ya que son las unicas que se van a usar de momento
 */
class DAOAbono
{
	//Funcion para listar los tipos de abono
	public static function list(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
		$query= sprintf("SELECT * FROM abono");
		$resultado = $conn->query($query);
		while($fila = mysqli_fetch_assoc($resultado)){
			$abono = new TOAbono();
			$abono->setTipoAbono($fila['tipo']);
		 	$abono->setCoste($fila['coste']);
			$abono->setDuracion($fila['duracion']);
			$abonos[] = $abono;
		}
		return $abonos;
	}

	public static function read($tipoAbono){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$query = sprintf("SELECT * FROM abono WHERE tipo='%s'"
		, $conn->real_escape_string($tipoAbono)
		);
		$resultado = $conn->query($query);
		$abono = new TOAbono();
		while($fila = mysqli_fetch_assoc($resultado)){
		$abono->setTipoAbono($fila['tipo']);
		$abono->setCoste($fila['coste']);
		$abono->setDuracion($fila['duracion']);
		}
		return $abono;	
	}
}

?>