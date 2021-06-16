<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormBuscarPelicula extends Form
{
    public function __construct()
    {
        parent::__construct('FormBuscarPelicula');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Buscador de películas</h1>
        </div>

        <div class="login-form">
        
        <table>
		
			<tr>
				<td>
					<label for="nombre">Título: </label>
				</td>
				<td>
					<input id="nombre" type="text" placeholder="Nombre" name="nombre">
				</td>
            </tr>
            

			<tr>
				<td>
					<label for="abono">Género: </label>
				</td>
                <td>
                <select name="genero">
                <option value="0" > - </option>';
                $generos = DAOGenero::list();
				foreach ($generos as $genero) {
					$resultado = $resultado . '<option value="' . $genero->getIdGenero() . '" >' . $genero->getTipo() . '</option>';
				}

                $resultado = $resultado . '
                </select>
                </td>
			</tr>
			</table>	
            <br> <br>	
			
			<button type="submit" name="buscarPelicula">Buscar películas</button>

            </div>
            </div>';
				
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	if (!isset($datos['buscarPelicula']) ) {
    		header('Location: peliculas');
    		exit();
    	}

    	$erroresFormulario = array();
        $correcto = true;

        

        $nombrePeli = isset($datos['nombre']) ? htmlspecialchars(trim(strip_tags($datos['nombre']))) : null;
        $genero = isset($datos['genero']) ? htmlspecialchars(trim(strip_tags($datos['genero']))) : null;


        if(isset($nombrePeli)){
            $pelis = DAOPelicula::listarPeliculasPorNombre($nombrePeli);
        }
        else{
            $pelis = DAOPelicula::listarPeliculas();
        }

        $pelisFiltradas = array();

        foreach ($pelis as $peli) {
            if ($genero != "0"){
                if(DAOGenero::comprobarGeneroPelicula($genero, $peli->getIdPelicula())) {
                    $pelisFiltradas[] = $peli;
                }
            }
            else {
                $pelisFiltradas[] = $peli;
            }
        }

        $_SESSION['pelisFiltradas'] = $pelisFiltradas;
        $_SESSION['generoFiltrado'] = $genero;
        $erroresFormulario = 'resultadosBuscarPeliculas';

        return $erroresFormulario;
	
    }
}
?>