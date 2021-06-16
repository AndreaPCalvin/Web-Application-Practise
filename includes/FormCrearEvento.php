<?php
namespace es\fdi\ucm\aw;

class FormCrearEvento extends Form
{
    public function __construct()
    {
        parent::__construct('FormCrearEvento');
    }

    function generaFormulario($errores = array(), &$datos = array())
    {

        $html = '<form method="POST" action="'.$this->action.'" id="'.$this->formId.'" enctype="multipart/form-data">';
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
					<h1> Añadir un nuevo evento </h1>
				</div>
				<div class="form-content">
						<label>Nombre del evento:</label>
						<input type="text" name="titulo" placeholder="Título" required>
						
						<label>Descripción:</label>
						<textarea name="descripcion" placeholder="Escriba aquí la descripción del evento" cols="50" rows="10" required></textarea>
						
						<label>Fecha:</label>
						<input type="date" name="fecha" required>
						
						<label>Categoría:</label>
						<select name="categoria">
						   <option value="estrenos">Estrenos</option>
						   <option value="críticas">Críticas</option>
						   <option value="premios">Premios</option>
						   <option value="infocine">Novedades de infocine</option>
						   <option value="noticias">Otras noticias</option>
						</select>						
									
						<label>Ciudad:</label>
						<input type="text" name="ciudad" placeholder="Ciudad del evento" required>
						
						<label>País:</label>
						<input type="text" name="pais" placeholder="País del evento" required>
						
						<label>Continente:</label>
						<input type="text" name="continente" placeholder="Continente del evento" required>
												
						<label>Imagen del evento: (tamaño máximo 1 GB)</label>
						<input type="file" name="foto" accept="image/*" required>
												
						<label>Haz click aquí para subir el evento: </label>
						<button id="eventoBotonForm" type="submit">Subir</button>
					
				</div>
			</div>
		';
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
					$result = array();
					$ok = true;
					
					$nombreImagen = $_FILES['foto']['name'];
					$tipoImagen = $_FILES['foto']['type'];
					$sizeImagen = $_FILES['foto']['size'];

					if($sizeImagen > pow(2, 30)){
						$result[] = "La imagen es demasiado grande, tamaño máximo : 1 GB";
						$ok = false;
					}
					elseif ($tipoImagen != "image/jpg" && $tipoImagen != "image/jpeg" && $tipoImagen != "image/png" && $tipoImagen != "image/gif") {
						$result[] = "La imagen debe ser tipo jpg, png o gif";
						$ok=false;
					}
					else {
						$carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/infocines/media/eventos/';

						move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaDestino . $nombreImagen);
						
						
						$evento = new TOEvento();
						$idEv = DAOEvento::getRowCount();
						 
						$evento->setidEvento($idEv);
						$evento->settitulo(htmlspecialchars(trim(strip_tags($_POST["titulo"])),  ENT_QUOTES, 'UTF-8'));
						$evento->setdescripcion(htmlspecialchars(trim(strip_tags($_POST["descripcion"])),  ENT_QUOTES, 'UTF-8'));
						$evento->setfecha(htmlspecialchars(trim(strip_tags($_POST["fecha"])),  ENT_QUOTES, 'UTF-8'));
						$evento->seturlImagen('media/eventos/'.$nombreImagen);
						$evento->setCategoria(htmlspecialchars(trim(strip_tags($_POST["categoria"])),  ENT_QUOTES, 'UTF-8'));
						$evento->setCiudad(htmlspecialchars(trim(strip_tags($_POST["ciudad"])),  ENT_QUOTES, 'UTF-8'));
						$evento->setPais(htmlspecialchars(trim(strip_tags($_POST["pais"])),  ENT_QUOTES, 'UTF-8'));
						$evento->setContinente(htmlspecialchars(trim(strip_tags($_POST["continente"])),  ENT_QUOTES, 'UTF-8'));

						if($ok){
							if(DAOEvento::create($evento)){
								$result = 'foro_eventos';
							}
							else{
								$result[] = 'Error. No se ha podido añadir el evento. Vuelva a intentarlo.';
							}
						}
					}
					return $result;
    }
}
?>