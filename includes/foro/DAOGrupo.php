<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
if (!defined('idGrupo')) define('idGrupo', 'idGrupo');
if (!defined('nombre')) define('nombre', 'nombre');
if (!defined('creador')) define('creador', 'creador');
if (!defined('apodo')) define('apodo', 'apodo');
if (!defined('id_usuario')) define('id_usuario', 'id_usuario');
if (!defined('fecha_union')) define('fecha_union', 'fecha_union');
if (!defined('num')) define('num', 'num');


class DAOGrupo{

	public static function listarPublico() {

      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();
      $sql = sprintf("SELECT * FROM grupo");
      $result = $conn->query($sql);

    
    #  $sql = "SELECT * FROM grupo";
     # $result = parent::consulta($sql);
      $i = 0;
      $listaGrupos = NULL;

      while ($row = $result->fetch_assoc()){

         if($row['tipo'] == "publico"){
           $grupo = new TOGrupo(); 

         $grupo->setidGrupo($row['idGrupo']);
         $grupo->setnombreGrupo($row['nombre']);
         $grupo->setcreadorGrupo($row['creador']);
         $grupo->setdescripcion($row['descripcion']);
         $grupo->setfecha($row['fecha_creacion']);
         $grupo->setnum_miembros($row['num_miembros']);
         $grupo->setborrado($row['borrado']);
         $grupo->settipo($row['tipo']);


         $listaGrupos[$i] = $grupo;
         $i = $i+1;
       }
      

      }
     
      return $listaGrupos;
   }

    public static function create($grupo) {
      $id = $grupo->getidGrupo();
      $nombreGrupo = $grupo->getnombreGrupo();
      $creadorGrupo = $grupo->getcreadorGrupo();
      $descGrupo = $grupo->getdescripcion();
      $fecha = $grupo->getfecha();
      $num_miembros = $grupo->getnum_miembros();
      $borrado = $grupo->getborrado();
      $tipo = $grupo->gettipo();


       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("INSERT INTO grupo VALUES('%d', '%s', '%s', '%s' ,'%s', '%d' , '%d','%s')"
       , $conn->real_escape_string($id)
       ,$conn->real_escape_string($nombreGrupo)
       ,$conn->real_escape_string($creadorGrupo)
       ,$conn->real_escape_string($descGrupo)
       ,$conn->real_escape_string($fecha)
       ,$conn->real_escape_string($num_miembros)
       ,$conn->real_escape_string($borrado)
       ,$conn->real_escape_string($tipo));



      if(!$conn->query($sql)){
        return FALSE;
      }
      else{
        return TRUE;
      }

    }

    public static function delete($id){

       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("DELETE FROM grupo WHERE idGrupo='%s'"
       , $conn->real_escape_string($id));

      if(!$conn->query($sql)){
        return FALSE;
      }
      else{
        return TRUE;
      }

    }

    public static function buscar($id){


       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("SELECT * FROM grupo");
       $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
          if ($row['idGrupo'] == $id) {
           $grupo = new TOGrupo(); 

           $grupo->setidGrupo($row['idGrupo']);
           $grupo->setnombreGrupo($row['nombre']);
           $grupo->setcreadorGrupo($row['creador']);
           $grupo->setdescripcion($row['descripcion']);
           $grupo->setfecha($row['fecha_creacion']);
           $grupo->setnum_miembros($row['num_miembros']);
           $grupo->setborrado($row['borrado']);
           $grupo->settipo($row['tipo']);
           return $grupo;

          }
        }
        return null;
        
    }

   public static function listarPorNombre($nombre) {

       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("SELECT * FROM grupo WHERE nombre LIKE '%%%s%%'", $conn->real_escape_string($nombre));
       $result = $conn->query($sql);


      $listaGrupos = NULL;

      while ($row = $result->fetch_assoc()){


       $grupo = new TOGrupo(); 

       $grupo->setidGrupo($row['idGrupo']);
       $grupo->setnombreGrupo($row['nombre']);
       $grupo->setcreadorGrupo($row['creador']);
       $grupo->setdescripcion($row['descripcion']);
       $grupo->setfecha($row['fecha_creacion']);
       $grupo->setnum_miembros($row['num_miembros']);
       $grupo->setborrado($row['borrado']);
       $grupo->settipo($row['tipo']);


       $listaGrupos[] = $grupo;

      }
     
      return $listaGrupos;
   }

    public static function listarGrupos($nombre){
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("SELECT * FROM miembros");
       $result = $conn->query($sql);
      
        $listaGrupos = NULL;
        $i=0;
        while($row = $result->fetch_assoc()){

          if ($row['id_usuario'] == $nombre) {
            $id = $row['id_grupo'];


      
           $consulta = sprintf("SELECT * FROM grupo");
           $resultado = $conn->query($consulta);
              

           while($fila = $resultado->fetch_assoc()){

                if($id == $fila['idGrupo'] ){
                   $grupo = new TOGrupo(); 

                   $grupo->setidGrupo($fila['idGrupo']);
                   $grupo->setnombreGrupo($fila['nombre']);
                   $grupo->setcreadorGrupo($fila['creador']);
                   $grupo->setdescripcion($fila['descripcion']);
                   $grupo->setfecha($fila['fecha_creacion']);
                   $grupo->setnum_miembros($fila['num_miembros']);
                   $grupo->setborrado($fila['borrado']);
                   $grupo->settipo($fila['tipo']);


                   $listaGrupos[$i] = $grupo;
                   
                   $i = $i+1;
                }

            }
          }
        }

        if($listaGrupos==NULL){
          return NULL;
        }
        else return $listaGrupos;
        
    }


    public static function getRowCount(){

       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("SELECT * FROM grupo");
       $result = $conn->query($sql);

      $i = 0;
      while($row = $result->fetch_assoc()){
        if ($i <= $row['idGrupo']) {
          $i = $row['idGrupo'] + 1;
        }
      }
      return $i;
    }

    public static function publicNameExists($nombreGrupo){


       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
    
       $sql = sprintf("SELECT * FROM grupo");
       $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
          if ($row['nombre'] == $nombreGrupo) {
            if($row['tipo'] == "publico"){
              return TRUE;
            }
         }
      }

      return FALSE;

    }




}

?>