<?php
namespace es\fdi\ucm\aw;

class FormLogin extends Form
{
    const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

    public function __construct() {
        parent::__construct('formLogin');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        return '
        <div class="login">
        <div class="login-header">
        <h1>Login</h1>
        </div>
        <div class="login-form">

        <h3>Nombre de usuario: </h3>
        <input id="nombre" type="text" placeholder="Nombre" name="usuario">
        <br>

        <h3>Contraseña: </h3>
        <input id="passwd" type="password" placeholder="Contraseña" name="password">
        <br>
        
        <button type="submit" name="login">Entrar</button>
        <br>
        <a class="sign-up" href="signin">Crea una cuenta</a>
        </div>
        </div>';

    }

    protected function procesaFormulario($datos)
    {
    	if (! isset($datos['login']) ) {
    		header('Location: login');
    		exit();
    	}

    	$erroresFormulario = array();
        $correcto = true;
    	$nombreUsuario = isset($datos['usuario']) ? htmlspecialchars(trim(strip_tags($datos['usuario'])),  ENT_QUOTES, 'UTF-8') : null;
        
        if ( !$nombreUsuario || mb_ereg_match(self::HTML5_EMAIL_REGEXP, $nombreUsuario) ) {
            $erroresFormulario[] = 'El nombre de usuario introducido no es válido';
            $correcto = false;
        }
        
        $password = isset($datos['password']) ? htmlspecialchars(trim(strip_tags($datos['password'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$password ) {
            $erroresFormulario[] = 'La contraseña de usuario introducida no es válida o no tiene la longitud adecuada';
            $correcto = false;
        }

        if($correcto){

            $usuarioTO = Usuario::login($nombreUsuario, $password);

    	    if( $usuarioTO ){
    	    	$_SESSION["login"] = true;
    		    $_SESSION["usuario"] = $usuarioTO->getApodo();
	    	    if($usuarioTO->getRol() == "admin"){
		    	    $_SESSION["esAdmin"] = true;
                }
                $erroresFormulario = 'index';
            }
            else {
                $erroresFormulario[] = 'El usuario o la contraseña no coinciden';
            }
            
        }
        return $erroresFormulario;
    }
}
?>