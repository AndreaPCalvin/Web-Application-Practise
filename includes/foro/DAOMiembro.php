<?php
namespace es\fdi\ucm\aw;

/**
 * 
 */

if (!defined('id_usuario')) define('id_usuario', 'id_usuario');
if (!defined('id_grupo')) define('id_grupo', 'id_grupo');
if (!defined('fecha_union')) define('fecha_union', 'fecha_union');
if (!defined('rol')) define('rol', 'rol ');

class DAOMiembro{


	public static function listarMiembros($idGrupo){

    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros");
    $result = $conn->query($sql);

      
    $listaMiembros = NULL;
    $i = 0;
      while($row = $result->fetch_assoc()){

         if($row['id_grupo'] == $idGrupo){ 
            $miembro = new TOMiembro(); 

           $miembro->setid_usuario($row['id_usuario']);
           $miembro->setid_grupo($row['id_grupo']);
           $miembro->setfecha_union($row['fecha_union']);
           $miembro->setrol($row['rol']);

           $listaMiembros[$i] = $miembro;
           $i = $i+1;
         }

      }


    return $listaMiembros;
 	}

	public static function cambiarRol($nomMiembro, $idGrupo, $_rol){

    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql=sprintf("UPDATE miembros SET rol = '%s' WHERE id_usuario = '%s' AND id_grupo = '%d'"
      ,$conn->real_escape_string($_rol)
      ,$conn->real_escape_string($nomMiembro)
      ,$conn->real_escape_string($idGrupo));



		 if(!$conn->query($sql)){
	        return FALSE;
	     }else{
	        return TRUE;
	     }

	}

	public static function buscar($nomMiembro, $idGrupo){


    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_usuario = '%s' AND id_grupo = '%s'"
      ,$conn->real_escape_string($nomMiembro)
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

	  $miembro = NULL;

	  $row = $result->fetch_assoc();


  	  $miembro = new TOMiembro(); 

      $miembro->setid_usuario($row['id_usuario']);
      $miembro->setid_grupo($row['id_grupo']);
      $miembro->setfecha_union($row['fecha_union']);
      $miembro->setrol($row['rol']);
  
      return $miembro;
	}



	public static function addMember($id_usuario, $idGrupo, $fecha_union,$rol){


    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("INSERT INTO miembros values('%s', '%s', '%s', '%s')"
      ,$conn->real_escape_string($id_usuario)
      ,$conn->real_escape_string($idGrupo)
      ,$conn->real_escape_string($fecha_union)
      ,$conn->real_escape_string($rol));

    if(!$conn->query($sql)){
        return FALSE;
      }
      else{

        $query = sprintf("SELECT * FROM grupo");
        $result = $conn->query($query);

        $num = 0;

        while ($row = $result->fetch_assoc()){

         if($row['idGrupo'] == $idGrupo){
          $num = 1;
        }

      }



      $query2 = sprintf("UPDATE grupo SET num_miembros = '%s' WHERE idGrupo = '%s'"
      ,$conn->real_escape_string($num)
      ,$conn->real_escape_string($idGrupo));


      if(!$conn->query($query2)){
        return FALSE;
      }else{
        return TRUE;
      }

      
    }


  } 


  public static function isMember($id_usuario, $idGrupo){

      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM miembros");
      $result = $conn->query($sql);
       
       while($row = $result->fetch_assoc()){

          if($row['id_usuario'] == $id_usuario){

            if($row['id_grupo'] == $idGrupo){
              return TRUE;

            }
          }
       }
       return FALSE;
    }

	public static function deleteMember($usuario,$idGrupo){

    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("DELETE FROM miembros WHERE id_usuario = '%s' AND id_grupo = '%s'"
      ,$conn->real_escape_string($usuario)
      ,$conn->real_escape_string($idGrupo));

     if(!$conn->query($sql)){
        return FALSE;
      }else{
        return TRUE;
      }

  }

	public static function isPropietario($usuario,$idGrupo){

    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

      if($row['id_usuario'] == $usuario){
        if($row['rol'] == "propietario"){
          return TRUE;
        }else{
          return FALSE;
        }
        
      }
    }

    return FALSE;

  }

  public static function isMod($usuario,$idGrupo){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){

      if($row['id_usuario'] == $usuario){
        if($row['rol'] == "moderador"){
          return TRUE;
        }else{
          return FALSE;
        }
        
      }
    }
    
    return FALSE;
    
  }

  public static function isUser($usuario,$idGrupo){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

      if($row['id_usuario'] == $usuario){
        if($row['rol'] == "usuario"){
          return TRUE;
        }else{
          return FALSE;
        }
        
      }
    }
    
    return TRUE;
  }

  public static function getPropietario($idGrupo){

    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
      if($row['rol'] == "propietario"){
        return $row['id_usuario'];
      }
    }

    return NULL;
  }

  public static function seleccionarPropietario($idGrupo){


    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
      ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

     if ($result->num_rows == 0){
        DAOGrupo::delete($idGrupo);  
        return FALSE;  

     }else{

      $date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");

       while($row = $result->fetch_assoc()){
          if($row['fecha_union'] < $date){
              $date = $row['fecha_union'];
              $nomMiembro = $row['id_usuario'];
          }
       }

       DAOMiembro::cambiarRol($nomMiembro, $idGrupo,"propietario");

       return TRUE;

     }

  }

  public static function memberExists($idGrupo, $nombre){

   $app = Aplicacion::getSingleton();
   $conn = $app->conexionBd();
   $sql = sprintf("SELECT * FROM miembros WHERE id_grupo = '%s'"
   ,$conn->real_escape_string($idGrupo));
    $result = $conn->query($sql);

     if ($result->num_rows == 0){
        return FALSE;  

     }else{

       while($row = $result->fetch_assoc()){
          if($row['id_usuario'] == $nombre){
            return TRUE;
          }
       }

       return FALSE;

     }


  }


}

?>