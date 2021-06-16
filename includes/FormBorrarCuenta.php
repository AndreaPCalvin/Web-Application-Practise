<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormBorrarCuenta extends Form
{
    //const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

    public function __construct()
    {
        parent::__construct('FormBorrarCuenta');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Borrar cuenta</h1>
        </div>

            <input type="checkbox" name="check" onchange="botonBorrar.disabled = !this.checked">

            <label for="borrarCuenta" class="borrarCuenta"> Quiero dar de baja mi cuenta (esta acción no se podrá deshacer)</label>
      <br><br>
			
			<button class="botonBorrar" type="submit" name="botonBorrar" disabled="disabled">Borrar cuenta</button>

        </div>';
				
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {

    	$erroresFormulario = array();

        if(Usuario::borrarUsuario($_SESSION['usuario'])){
            $erroresFormulario = 'logout';
        }
        else{
            $erroresFormulario[] = 'error al borrar el usuario';
        }
        
        return $erroresFormulario;
    }
}
?>