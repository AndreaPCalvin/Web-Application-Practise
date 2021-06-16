<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormModificarCuenta extends Form
{
    public function __construct()
    {
        parent::__construct('FormModificarCuenta');
    }

    //Sobreescribimos la funcion para poner el enctype para permitir la subida de archivos
    function generaFormulario($errores = array(), &$datos = array())
    {

        $html= $this->generaListaErrores($errores);

        $html .= '<form method="POST" action="'.$this->action.'" id="'.$this->formId.'" enctype="multipart/form-data">';
        $html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';

        $html .= $this->generaCamposFormulario($datos);
        $html .= '</form>';
        return $html;
    }

	protected function generaCamposFormulario($datosIniciales)
    {
        $usuario = Usuario::buscaUsuario($_SESSION['usuario']);
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Tu cuenta</h1>
        </div>

        <div class="login-form">
        <div class="foto">
            <img src="'. $usuario->getUrlFoto().'" alt="" width=300>
            <input type="file" name="avatar" accept="image/*">
        </div>
        <table>
		
            <tr>
                <td><p> Información personal </p></td>
            </tr>
			<tr>
				<td>
					<label for="nombrecompleto">Nombre: </label>
				</td>
				<td>
					<input id="nombrecompleto" type="text" placeholder="Nombre" name="nombre" value="' . $usuario->getNombre() . '">
				</td>
			</tr>

			<tr>
				<td>
					<label for="apellidos">Apellidos: </label>
				</td>
				<td>
					<input id="apellidos" type="text" placeholder="Apellidos" name="apellidos"  value="' . $usuario->getApellidos() . '">
				</td>
			</tr>
           
            <tr>
                <td><p> Información de perfil </h2></p>
            </tr>
            <tr>
               
                <td>
                    <label for="apodo">Nickname: </label>
                </td>
                <td>
                    <input id="apodo" type="text" placeholder="nickname" name="apodo" value="' . $usuario->getApodo() . '">
                </td>
            </tr>
			<tr>
				<td>
					<label for="email">Email: </label>
				</td>
				<td>
					<input id="email" type="email" placeholder="Email" name="email" value="' . $usuario->getEmail() . '">
				</td>
			</tr>
          
            <tr> 
                <td><p> Información de suscripción </h2></p>
            </tr>         

			<tr>
				<td>
					<label for="abono">Tipo de abono: </label>
				</td>
				<td>';

				$abonos = DAOAbono::list();
				foreach ($abonos as $abono) {
					if ($abono->getTipoAbono() == $usuario->getTipoAbono()) {
						$resultado = $resultado . '<input type="radio" name="tipoAbono" value="' . $abono->getTipoAbono() . '" checked>' . $abono->getTipoAbono();
					} else {
						$resultado = $resultado . '<input type="radio" name="tipoAbono" value="' . $abono->getTipoAbono() . '" >' . $abono->getTipoAbono();
					}
					
				}

				$resultado = $resultado . '</td>
			</tr>
			</table>	
            <br> <br>	
			
			<button type="submit" name="modifCuenta">Modificar cuenta</button>

            </div>
            </div>';
				
		
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	if (!isset($datos['modifCuenta']) ) {
    		header('Location: miCuenta');
    		exit();
    	}

    	$erroresFormulario = array();
        $correcto = true;

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

        $nombreImagen = isset($_FILES['avatar']['name']) ? htmlspecialchars(trim(strip_tags($_FILES['avatar']['name'])),  ENT_QUOTES, 'UTF-8') : null;

        if (mb_strlen($nombreImagen) > 0) {
            $tipoImagen = $_FILES['avatar']['type'];
            $sizeImagen = $_FILES['avatar']['size'];
            if($tipoImagen != "image/jpg" && $tipoImagen != "image/jpeg"){
                $erroresFormulario[] = 'La imagen debe ser jpeg o jpg';
                $correcto = false;
            }
            if($tipoImagen != "image/jpg" && $tipoImagen != "image/jpeg"){
                $erroresFormulario[] = 'La imagen debe ser jpeg o jpg';
                $correcto = false;
            }
            if ($sizeImagen > pow(2, 30)) {
                $erroresFormulario[] = "La imagen es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
                $correcto = false;
            }
        }
        
        if($correcto){
            if(Usuario::modificar($_SESSION['usuario'], $nombreCompleto, $apellidos, $email, $tipoAbono, $nombreImagen)){
                $_SESSION['modificarPerfil'] = true;
                $erroresFormulario = 'miCuenta';
            }
            else {
                $erroresFormulario[] = 'El usuario no se ha podido modificar';
            } 
            
	        
        }
        return $erroresFormulario;
	
    }
}
?>