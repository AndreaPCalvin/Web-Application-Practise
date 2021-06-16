<?php
namespace es\fdi\ucm\aw;

class FormSignin extends Form
{
    
    public function __construct()
    {
        parent::__construct('FormSignin');
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Registro</h1>
        </div>
        <div class="login-form">
		
		<h3>Nickname <i class="fa fa-times-circle" id="nickMal"></i><i class="fa fa-check-circle" id="nickBien"></i></h3>
		<input id="nick" type="text" placeholder="Nickname" name="usuario" required>

		<h3>Contraseña <i class="fa fa-times-circle" id="cm"></i><i class="fa fa-check-circle" id="cb"></i></h3>
		<input id="passwd" type="password" placeholder="Contraseña" name="password" required>
		
		<h3>Repita la contraseña <i class="fa fa-times-circle" id="cm2"></i><i class="fa fa-check-circle" id="cb2"></i></h3>		
		<input id="passwd2" type="password" placeholder="Repita la contraseña" required>
		<div id="passIgual"></div>
		
		<h3>Nombre <i class="fa fa-times-circle" id="nm"></i><i class="fa fa-check-circle" id="nb"></i></h3>	
		<input id="nombrecompleto" type="text" placeholder="Nombre" name="nombre" required>
		
		<h3>Apellidos <i class="fa fa-times-circle" id="am"></i><i class="fa fa-check-circle" id="ab"></i></h3>
		<input id="apellidos" type="text" placeholder="Apellidos" name="apellidos" required>
		
		<h3>Correo <i class="fa fa-times-circle" id="em"></i><i class="fa fa-check-circle" id="eb"></i></h3>
		<input id="correo" type="email" placeholder="Email" name="email" required>
		
		<h3>Tipo de abono </h3>';

				$abonos = DAOAbono::list();
				foreach ($abonos as $abono) {
					$resultado = $resultado . '<input type="radio" name="tipoAbono" value="' . $abono->getTipoAbono() . '" required>' . $abono->getTipoAbono();

				}
				
			$resultado = $resultado . '	
			
		<br>
		<br>
		<button type="submit" id="boton" name="signin">Crear cuenta</button><br>
		<div id="miTexto"></div>
		<br>
        <a class="sign-up" href="index">Volver</a>
		</div>
		</div>';
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	if (! isset($datos['signin']) ) {
    		header('Location: signin');
    		exit();
    	}

    	$erroresFormulario = array();
        $correcto = true;
    	$nombreUsuario = isset($datos['usuario']) ? htmlspecialchars(trim(strip_tags($datos['usuario'])),  ENT_QUOTES, 'UTF-8') : null;
        
        if ( !$nombreUsuario) {
            $erroresFormulario[] = 'El nombre de usuario introducido no es válido';
            $correcto = false;
        }
        
        $password = isset($datos['password']) ? htmlspecialchars(trim(strip_tags($datos['password'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$password ) {
            $erroresFormulario[] = 'La contraseña de usuario introducida no es válida o no tiene la longitud adecuada';
            $correcto = false;
        }

        $nombreCompleto = isset($datos['nombre']) ? htmlspecialchars(trim(strip_tags($datos['nombre'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$nombreCompleto ) {
            $erroresFormulario[] = 'El nombre introducido no es válido';
            $correcto = false;
        }

        $apellidos = isset($datos['apellidos']) ? htmlspecialchars(trim(strip_tags($datos['apellidos'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$apellidos ) {
            $erroresFormulario[] = 'Los apellidos introducidos no son válidos';
            $correcto = false;
        }

        $email = isset($datos['email']) ? htmlspecialchars(trim(strip_tags($datos['email'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$email ) {
            $erroresFormulario[] = 'El email introducido no es válido';
            $correcto = false;
        }

        $tipoAbono = isset($datos['tipoAbono']) ? htmlspecialchars(trim(strip_tags($datos['tipoAbono'])),  ENT_QUOTES, 'UTF-8') : null;

        if ( !$tipoAbono ) {
            $erroresFormulario[] = 'El tipo de abono seleccionado no es correcto';
            $correcto = false;
        }
        

        if($correcto){
            $inicioAbono = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H") . ":" . date("i") . ":" . date("s");
            $creado = Usuario::crea($nombreUsuario, $password, $nombreCompleto, $apellidos, $email, $tipoAbono, $inicioAbono, 'user');

            if(!$creado) {
                $erroresFormulario[] = 'El usuario ' . $nombreUsuario . ' ya existe.';
            }
            else {
                $_SESSION["login"] = true;
                $_SESSION["usuario"] = $nombreUsuario;
                $erroresFormulario = 'index';
                
            }
	        
        }

        return $erroresFormulario;
	
    }
}

