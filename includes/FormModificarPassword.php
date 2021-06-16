<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormModificarPassword extends Form
{
    //const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

    public function __construct()
    {
        parent::__construct('FormModificarPassword');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $resultado = '

       
        <div class="login">
        <div class="login-header">
             <h1>Datos de contraseña</h1>
        </div>
        <div class="login-form">
        <table>
            <tr>
				<td>
					<label for="passwd">Contraseña actual: </label>
				</td>
				<td>
					<input id="passwd" type="password" placeholder="Contraseña" name="password">
				</td>
            </tr>
            
			<tr>
				<td>
					<label for="passwdNew">Contraseña nueva: </label>
				</td>
				<td>
					<input id="passwdNew" type="password" placeholder="Contraseña" name="passwordNew">
				</td>
			</tr>

			<tr>
				<td>
					<label for="passwdNew2">Repite la contraseña: </label>
				</td>
				<td>
					<input id="passwdNew2" type="password" placeholder="Repetir contraseña" name="passwordNew2">
				</td>
			</tr>
			</table>		
			
			<button type="submit" name="modifPasswd">Aceptar</button>

            </div>
            </div>';
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	if (! isset($datos['modifPasswd']) ) {
    		header('Location: miCuenta');
    		exit();
    	}

    	$erroresFormulario = array();
        $correcto = true;

        $password = isset($datos['password']) ? htmlspecialchars(trim(strip_tags($datos['password'])),  ENT_QUOTES, 'UTF-8') : null;

        $usuario = Usuario::buscaUsuario($_SESSION['usuario']);
        if (!password_verify($password, $usuario->getContrasena())) {
            $erroresFormulario[] = 'La contraseña de usuario introducida no es correcta';
            $correcto = false;
        }

        $passwordNew = isset($datos['passwordNew']) ? $datos['passwordNew'] : null;

        if ( empty($passwordNew) || mb_strlen($passwordNew) < 4 ) {
            $erroresFormulario[] = "La nueva contraseña debe tener una longitud de al menos 4 caracteres";
            $correcto = false;
        }

        if (strcmp($password, $passwordNew) == 0) {
            $erroresFormulario[] = "La nueva contraseña y la antigua deben ser diferentes";
            $correcto = false;
        }

        $passwordNew2 = isset($datos['passwordNew2']) ? $datos['passwordNew2'] : null;

        if ( empty($passwordNew2) || strcmp($passwordNew, $passwordNew2) !== 0 ) {
            $erroresFormulario[] = "Las contraseñas no coinciden";
            $correcto = false;
        }
        

        if($correcto){                
            if(Usuario::cambiarPassword($_SESSION['usuario'], $passwordNew)){
                $_SESSION['modificarPassword'] = true;
                $erroresFormulario = 'miCuenta';
            }
            else {
                $erroresFormulario[] = 'La contraseña no se ha podido modificar';
            } 
	        
        }
        return $erroresFormulario;
	
    }
}
?>