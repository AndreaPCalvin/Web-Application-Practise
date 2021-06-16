<?php
namespace es\fdi\ucm\aw;

class FormCrearGrupo extends Form
{
    public function __construct()
    {
        parent::__construct('FormCrearGrupo');
    }

    function generaFormulario($errores = array(), &$datos = array())
    {

        $html= $this->generaListaErrores($errores);

        $html .= '<form action="'.$this->action.'" id="'.$this->formId.'"method="POST" enctype="multipart/form-data">';
 		$html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';
        $html .= $this->generaCamposFormulario($datos);
        $html .= '</form>';
        return $html;
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $resultado = '
			<div class="form">
						<div class="form-header">
							<h1> Crear nuevo grupo </h1>
						</div>
						<div class="form-content">
							<label>Nombre del grupo (Máximo 20 caracteres): </label>
							<input type="text" name="nombre" required>
							
							<label>Descripción: </label>
							<input type="text" name="desc" required>
							
							<label>Elija el tipo de grupo: </label>
							<input type="checkbox" name="tipo" value="publico" onclick="onlyOne(this)" checked>Público
							<input type="checkbox" name="tipo" value="privado" onclick="onlyOne(this)">Privado

						<script src="js/grupo.js" type="text/javascript"></script>
							
							<label>Haga click para crear el grupo</label>
							<button type="submit">Crear</button>
						</div>
					</div>

		';
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
	 $result = array();
	 $ok = false;

			$nombreGrupo = htmlspecialchars(trim(strip_tags($datos["nombre"])),  ENT_QUOTES, 'UTF-8');
			$descGrupo = htmlspecialchars(trim(strip_tags($datos["desc"])),  ENT_QUOTES, 'UTF-8');
			$tipoGrupo = htmlspecialchars(trim(strip_tags($datos["tipo"])),  ENT_QUOTES, 'UTF-8');
			$idGrupo = 0;
			$creador =  $_SESSION["usuario"];
			$timeSeconds = time();
			$date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");

			  $idGrupo = DAOGrupo::getRowCount();
			  $grupo = new TOGrupo(); 

			  $grupo->setidGrupo($idGrupo);
			  $grupo->setnombreGrupo($nombreGrupo);
			  $grupo->setcreadorGrupo($creador);
			  $grupo->setdescripcion($descGrupo);
			  $grupo->setfecha($date);
			  $grupo->setnum_miembros(0);
			  $grupo->setborrado(0);
			  $grupo->settipo($tipoGrupo);

		  if($tipoGrupo == "publico"){
		  		if(!DAOGrupo::publicNameExists($nombreGrupo)){
		  			$ok = TRUE;
		  		}
		  }else{
		  	$ok = TRUE;
		  }


			if($ok){
			 $grupos = DAOGrupo::create($grupo); 

			  
			  if(!$grupos){
			  	$result[] = "No se ha podido crear el grupo correctamente";
			  }
			  else{
			  	if(!DAOMiembro::addMember($creador,$idGrupo,$date,"propietario")){
			  		$result[] = "Error al añadir miembro";
			  	}
			  	else{
			  		$result = 'foro_grupos';
			  	}
			  }

			}else{
				$result[] = "Ya existe un grupo publico con ese nombre";
			}



	 return $result;
    }
}
?>