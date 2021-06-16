<?php
namespace es\fdi\ucm\aw;

class FormCrearRespuesta extends Form
{
	protected $idTema;

    public function __construct()
    {
    	$this->idTema = $_SESSION['tema'];
        parent::__construct('FormCrearRespuesta');
    }


    function generaFormulario($errores = array(), &$datos = array())
    {
		$this->idTema = $_SESSION['tema'];
        $html= $this->generaListaErrores($errores);

        $html .= '<form action="'.$this->action.'" id="'.$this->formId.'"method="POST" enctype="multipart/form-data">';
 		$html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';
        $html .= $this->generaCamposFormulario($datos);
        $html .= '</form>';
        return $html;
    }

	protected function generaCamposFormulario($datosIniciales)
    {
    	$this->idTema = $_SESSION['tema'];
        $resultado = '
		<label>Publicar comentario: </label><br>
		<textarea name="contenido" cols="40" rows="3" required></textarea><br>
		<button class="buttonDefault" type="submit">Añadir</button>
		<input type ="hidden" name="idT" value="'.$this->idTema.'">
		';
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	$this->idTema = $_SESSION['tema'];
			$result = array();
			$contenido = htmlspecialchars(trim(strip_tags($datos["contenido"])),  ENT_QUOTES, 'UTF-8');
			$idTema = htmlspecialchars(trim(strip_tags($datos["idT"])),  ENT_QUOTES, 'UTF-8');
			$idRespuesta = 0;
			$creador =  $_SESSION["usuario"];
			$timeSeconds = time();
			$date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");
			
			

			  $idRespuesta = DAORespuesta::getRowCount();
			  $respuesta = new TORespuesta();
			  $respuesta->setidRespuesta($idRespuesta);
			  $respuesta->setcontenido($contenido);
			  $respuesta->setfecha($date);
			  $respuesta->setborrado(0);
			  $respuesta->setid_tema($idTema);
			  $respuesta->setescritor($creador);
			  $creado = DAORespuesta::create($respuesta);
			  if ($creado) {
			  	$result = "temaConcreto";
			  
			  } else {
			  	$result[] = "Error, no se ha podido crear la respuesta";
			  }


	 return $result;
    }
}
?>