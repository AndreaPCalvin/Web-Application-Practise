<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class DAORespuesta{


	public static function listar(){

	  $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM respuestas ORDER BY fecha DESC");
      $result = $conn->query($sql);

      $i = 0;
      $listaRespuestas = NULL;

      if ($result->num_rows == 0)
        return NULL;  
      while ($row = $result->fetch_assoc()){


       $respuesta = new TORespuesta(); 
       
       $respuesta->setidRespuesta($row['idRespuesta']);
       $respuesta->setcontenido($row['contenido']);
       $respuesta->setfecha($row['fecha']);
       $respuesta->setborrado($row['borrado']);
       $respuesta->setid_tema($row['id_tema']);
       $respuesta->setescritor($row['escritor']);


       $listaRespuestas[$i] = $respuesta;
       $i = $i+1;

      }
     
      return $listaRespuestas;
	}


	public static function create($respuesta){
       $idRespuesta = $respuesta->getidRespuesta();
       $contenido = $respuesta->getcontenido();
       $fecha = $respuesta->getfecha();
       $borrado = $respuesta->getborrado();
       $id_tema = $respuesta->getid_tema();
       $escritor = $respuesta->getescritor();

   
	  $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("INSERT INTO respuestas values('%d', '%s', '%s', '%d', '%d', '%s')"
      	,$conn->real_escape_string($idRespuesta)
      	,$conn->real_escape_string($contenido)
      	,$conn->real_escape_string($fecha)
      	,$conn->real_escape_string($borrado)
      	,$conn->real_escape_string($id_tema)
      	,$conn->real_escape_string($escritor));
     


      if(!$conn->query($sql)){
        return FALSE;
      }
      else{
        return TRUE;
      }
	}


	public static function delete($id){
		
		 #$sql = "DELETE FROM respuestas WHERE idRespuesta = '$id'";

	  $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("UPDATE respuestas SET borrado = 1 WHERE idRespuesta = '%s'"
  	  ,$conn->real_escape_string($id));
     
		 if(!$conn->query($sql)){
      	  return FALSE;
      	}
	      else{
	        return TRUE;
     	 }

	}

	 public static function getRowCount(){

	  $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM respuestas");
      $result = $conn->query($sql);

      $i = 0;
      while($row = $result->fetch_assoc()){
        if ($i <= $row['idRespuesta']) {
          $i = $row['idRespuesta'] + 1;
        }
      }
      return $i;
    }

}

?>