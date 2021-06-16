<?php
namespace es\fdi\ucm\aw;

class FormCrearTema extends Form
{
	protected $id_grupo;

    public function __construct()
    {
			$this->id_grupo = $_SESSION['grupo'];
    	
        parent::__construct('FormCrearTema');
    }



    protected function generaFormulario($errores = array(), &$datos = array())
    {
    	$this->id_grupo = $_SESSION['grupo'];

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
								<h1> Añadir un nuevo tema </h1>
							</div>
							<div class="form-content">
					<label>Nombre del tema (Máximo 20 caractéres) de grupo:</label>
					<input type="text" name="nombre" required>
					
					<label>Descripción:</label><input type="text" name="desc" required>
					<label>Pulsa para añadir el tema</label>
					<button type=submit>Crear</button>
					<input type ="hidden" name="idG" value="'.$this->id_grupo.'">
					
					</div></div>
		';

		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
     $ok = false;
	 $result = array();

			$tituloTema = htmlspecialchars(trim(strip_tags($datos["nombre"])),  ENT_QUOTES, 'UTF-8');
			$idTema = 0;
			$idGrupo = htmlspecialchars(trim(strip_tags($datos["idG"])),  ENT_QUOTES, 'UTF-8');
			$creador =  $_SESSION["usuario"];
			$desc = htmlspecialchars(trim(strip_tags($datos["desc"])),  ENT_QUOTES, 'UTF-8');
			$timeSeconds = time();
			$date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");
			

			  $idTema = DAOTema::getRowCount();
			  $tema = new TOTema();
			  $tema->setid_grupo($idGrupo);
			  $tema->setcreador($creador);
			  $tema->setidTema($idTema);
			  $tema->settitulo($tituloTema);
			  $tema->setfecha_creacion($date);
			  $tema->setdescripcion($desc);
			  $tema->setborrado(0);
			  if(!DAOTema::nameExists($tituloTema,$idGrupo)){
			  	$ok = true;
			  }
			 
			  if ($ok) {
			  	$creado = DAOTema::create($tema);
			  	if($creado){
					$result ="GrupoConcreto?id=".$idGrupo;
			  	}else{
			  		$result[] = "Error, no se ha podido crear el tema".$idGrupo;
			  	}
						  	
			  } else {
			  	$result[] = "Nombre del tema ya existe";
			  }


	 return $result;
    }
}
?>