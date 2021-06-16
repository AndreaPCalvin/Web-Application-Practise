<?php
namespace es\fdi\ucm\aw;

class FormAddMiembro extends Form
{
	protected $idGrupo;

    public function __construct()
    {
        parent::__construct('FormAddMiembro');
        $this->idGrupo = $_SESSION['grupo'];
    }

    function generaFormulario($errores = array(), &$datos = array())
    {
 		$this->idGrupo = $_SESSION['grupo'];
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
			<label>Buscar usuario:</label><input type="text" name="nombre">
			<button class="buttonDefault" id="nuevo" type="submit">Añadir</button>
			<input type ="hidden" name="idG" value="'.$this->idGrupo.'">
		';
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
		$idGrupo = $datos['idG'];
		$date = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");
		$nomUsuario = $datos['nombre'];

		$usuario = DAOUsuario::read($nomUsuario);

		if($usuario== NULL){
			$user = NULL;
		}else{
			$user = $usuario->getApodo();
		}


		if($user == NULL){
			$result[] =  "No existe el usuario: ".$nomUsuario;
		}else{
			if(!DAOMiembro::memberExists($idGrupo,$user)){
				$added = DAOMiembro::addmember($user, $idGrupo, $date,"usuario");
				if ($added) {
					$result ="GrupoConcreto?id=".$idGrupo;
				}else{
					$result[] = "Error al añadir miembro";
				}
			}else{
				$result[] = "¡El usuario ya pertenece al grupo!";
				
			}
			
		}
		
		
	 return $result;
    }
}
?>