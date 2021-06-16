<?php
namespace es\fdi\ucm\aw;

if (!defined('id_grupo')) define('id_grupo', 'id_grupo');
if (!defined('creador')) define('creador', 'creador');
if (!defined('idTema')) define('idTema', 'idTema');
if (!defined('titulo')) define('titulo', 'titulo');
if (!defined('fecha_creacion')) define('fecha_creacion', 'fecha_creacion');
if (!defined('descripcion')) define('descripcion', 'descripcion');
if (!defined('borrado')) define('borrado', 'borrado');

class DAOTema{


	public static function listar($id){

      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM temas WHERE id_grupo = '%s'"
        ,$conn->real_escape_string($id));
      $result = $conn->query($sql);


      if ($result->num_rows == 0)
        return NULL;

      $i = 0;
      $listaTemas = NULL;
      while ($row = $result->fetch_assoc()){


       $tema = new TOTema(); 
       
       $tema->setid_grupo($row['id_grupo']);
       $tema->setcreador($row['creador']);
       $tema->setidTema($row['idTema']);
       $tema->settitulo($row['titulo']);
       $tema->setfecha_creacion($row['fecha_creacion']);
       $tema->setdescripcion($row['descripcion']);
       $tema->setborrado($row['borrado']);


       $listaTemas[$i] = $tema;
       $i = $i+1;

      }
     
      return $listaTemas;


	}

  public static function listarPorNombreYGrupo($nombre, $idGrupo){

      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM temas WHERE (titulo LIKE '%%%s%%') AND (id_grupo = '%d')"
        ,$conn->real_escape_string($nombre)
        ,$conn->real_escape_string($idGrupo));

      #$sql = "SELECT * FROM temas WHERE (titulo LIKE '%$nombre%') AND (id_grupo = '$idGrupo')";
      $result = $conn->query($sql);
      $listaTemas = NULL;

      while ($row = $result->fetch_assoc()){


       $tema = new TOTema(); 
       
       $tema->setid_grupo($row['id_grupo']);
       $tema->setcreador($row['creador']);
       $tema->setidTema($row['idTema']);
       $tema->settitulo($row['titulo']);
       $tema->setfecha_creacion($row['fecha_creacion']);
       $tema->setdescripcion($row['descripcion']);
       $tema->setborrado($row['borrado']);


       $listaTemas[] = $tema;
      }
     
      return $listaTemas;


  }

	public static function create($tema){
       $id_grupo = $tema->getid_grupo();
       $creador = $tema->getcreador();
       $idTema = $tema->getidTema();
       $titulo = $tema->gettitulo();
       $fecha_creacion = $tema->getfecha_creacion();
       $descripcion = $tema->getdescripcion();
       $borrado = $tema->getborrado();


      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("INSERT INTO temas values('%d', '%s', '%d', '%s' ,'%s','%s','%d')"
        ,$conn->real_escape_string($id_grupo)
        ,$conn->real_escape_string($creador)
        ,$conn->real_escape_string($idTema)
        ,$conn->real_escape_string($titulo)
        ,$conn->real_escape_string($fecha_creacion)
        ,$conn->real_escape_string($descripcion)
        ,$conn->real_escape_string($borrado));



       #$sql = "INSERT INTO temas values($id_grupo, '$creador', $idTema, '$titulo' ,'$fecha_creacion','$descripcion', $borrado)";

      if(!$conn->query($sql)){
        return FALSE;
      }
      else{
        return TRUE;
      }
	}


  public static function buscar($idTema){


      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM temas");
      $result = $conn->query($sql);

      while($row = $result->fetch_assoc()){
        if ($row['idTema'] == $idTema) {
         $tema = new TOTema(); 

         $tema->setid_grupo($row['id_grupo']);
         $tema->setcreador($row['creador']);
         $tema->setidTema($row['idTema']);
         $tema->settitulo($row['titulo']);
         $tema->setfecha_creacion($row['fecha_creacion']);
         $tema->setdescripcion($row['descripcion']);
         $tema->setborrado($row['borrado']);
         return $tema;

        }
      }
    return null;
        
    }

   public static function getRowCount(){
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM temas");
      $result = $conn->query($sql);
      $i = 0;
      while($row = $result->fetch_assoc()){
        if ($i <= $row['idTema']) {
          $i = $row['idTema'] + 1;
        }
      }
      return $i;
    }

    public static function nameExists($nombre,$idGrupo){
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM temas WHERE id_grupo = '%s'"
        ,$conn->real_escape_string($idGrupo));
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
          if($row['titulo'] == $nombre){
            return TRUE;
          }
      }

      return FALSE;
    }


}

?>