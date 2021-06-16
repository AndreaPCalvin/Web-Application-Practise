<?php
namespace es\fdi\ucm\aw;

class FormBuscadorEventos extends Form
{
    public function __construct()
    {
        parent::__construct('FormBuscadorEventos');
    }
	
 
	

	protected function generaCamposFormulario($datosIniciales)
    {
        $result = '<h1 class="content"> Buscar eventos </h1>
							<div id="buscarForm">
							<label class="texto">Nombre: </label><input type="text" name="titulo" placeholder="Título (parcial) del evento">
							<label class="texto">Lugar: </label><input type="text" name="place" placeholder="Ciudad, país o continente del evento">
							<label class="texto">Fecha: </label><input type="date" name="fecha">
							<label class="texto">Categoría: </label>
								<select name="categoria">
									<option value="">-</option>
								   <option value="premios">Premios</option>
								   <option value="estrenos">Estrenos</option>
								   <option value="críticas">Críticas</option>
								   <option value="infocine">Novedades de infocine</option>
								   <option value="noticias">Otras noticias</option>
								</select>
							<input type="submit" value="Buscar"></button>
							</div>
		';
		return $result;
    }

    protected function procesaFormulario($datos)
    {
		$erroresFormulario = array();
			
		if(isset($_POST["titulo"])){
			$titulo = htmlspecialchars(trim(strip_tags($_POST["titulo"])),  ENT_QUOTES, 'UTF-8');
			$fecha = htmlspecialchars(trim(strip_tags($_POST["fecha"])),  ENT_QUOTES, 'UTF-8');
			$lugar = htmlspecialchars(trim(strip_tags($_POST["place"])),  ENT_QUOTES, 'UTF-8');
			$categoria = htmlspecialchars(trim(strip_tags($_POST["categoria"])),  ENT_QUOTES, 'UTF-8');
			
			$erroresFormulario = 'resultadoBuscarEventos?titulo='.$titulo.'&lugar='.$lugar.'&fecha='.$fecha.'&categoria='.$categoria;
		}	
		return $erroresFormulario;
    }
	
	
}

