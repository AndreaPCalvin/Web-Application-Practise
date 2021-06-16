<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormBorrarPelicula extends Form
{
    public function __construct()
    {
        parent::__construct('FormBorrarPelicula');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $pelicula = DAOPelicula::read($_SESSION["pelicula"]);
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Borrar '. $pelicula->getTitulo() .'</h1>
        </div>
        <input id="id" type="text" placeholder="id" name="id" value="' . $_SESSION["pelicula"] . '">
			<button class="botonBorrar" type="submit" name="botonBorrar">Borrar esta pelicula</button>

        </div>';
				
		
    return $resultado;
    }

    protected function procesaFormulario($datos){
        $erroresFormulario = array();
                
        if(DAOPelicula::delete($_SESSION["pelicula"])){
            $_SESSION['borrarPelicula'] = true;
            $erroresFormulario = 'peliculas';
        }
        else{
            $erroresFormulario[] = 'Error al borrar la pelicula';
        }
        
        return $erroresFormulario;
    }
}
?>