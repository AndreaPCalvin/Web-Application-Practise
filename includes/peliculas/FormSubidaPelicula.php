<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormSubidaPelicula extends Form
{
    //const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';

    public function __construct()
    {
        parent::__construct('FormSubidaPelicula');
    }

    protected function generaFormulario($errores = array(), &$datos = array())
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
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Subir película</h1>
        </div> 

        <div class="login-form">
        <table>

        <tr>
        <td>
            <label>Nombre clave de la película:</label>
        </td>
        <td>
            <input type="text" name="id" required>
        </td>
    </tr>
    <tr>
                <td>
                    <label>Nombre:</label>
                </td>
                <td>
                <input type="text" name="titulo" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Descripción:</label><br>
                </td>
                <td>
                <textarea name="descripcion" minlength="50" maxlength="10000" placeholder="Escriba aquí la descripción de la película" cols="30" rows="5" required></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Director:</label>
                </td>
                <td>
                <input type="text" name="director" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Año:</label>
                </td>
                <td>
                <input type="number" min="1900" max="2099" step="1" value="2020" name="anio" required>
                </td>
            </tr>

            <tr>
            <td>
                <label>Género:</label>
            </td>
            <td>
            <select id="generos" name="generos[]" multiple required>';
            $generos = DAOGenero::list();
            foreach ($generos as $genero) {
                $resultado .= '<option value="' . $genero->getIdGenero() . '" >' . $genero->getTipo() . '</option>';
            }
        $resultado .= '
            
            </select>
            </td>
        </tr>


        <tr>
        <td>
            <label>Imagen: (tamaño máximo ' .pow(2, 30)/pow(2, 30) . 'GB)</label>
        </td>
        <td>
            <input type="file" name="imagenSubida" accept="image/*" required>
        </td>
    </tr>

    <tr>
    <td>
        <label>Trailer: (tamaño máximo' . pow(2, 30)/pow(2, 30) . 'GB)</label>
    </td>
    <td>
    <input type="file" name="trailerSubida" accept="video/*" required>
    </td>
</tr>

<tr>
<td>
    <label>Vídeo: (tamaño máximo' . pow(2, 30)/pow(2, 30) . 'GB)</label>
</t>
<td>
<input type="file" name="videoSubida" accept="video/*" required>
</td>
</tr>
</table>    
            
            <button type="submit">Subir</button>
            </div></div>';
				
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {
    	$erroresFormulario = array();
        $correcto = true;
                
    //Recibimos datos del video
        $nombreImagen = $_FILES['imagenSubida']['name'];
        $tipoImagen = $_FILES['imagenSubida']['type'];
        $sizeImagen = $_FILES['imagenSubida']['size'];

        $nombreTrailer = $_FILES['trailerSubida']['name'];
        $tipoTrailer = $_FILES['trailerSubida']['type'];
        $sizeTrailer = $_FILES['trailerSubida']['size'];

        $nombreVideo = $_FILES['videoSubida']['name'];
        $tipoVideo = $_FILES['videoSubida']['type'];
        $sizeVideo = $_FILES['videoSubida']['size'];

    if($sizeImagen > pow(2, 30)){
        $erroresFormulario[] = "La imagen es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
        $correcto = false;
    }
    elseif ($sizeTrailer > pow(2, 30)) {
        $erroresFormulario[] =  "El trailer es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
         $correcto = false;
    }
    elseif ($sizeVideo > pow(2, 30)) {
        $erroresFormulario[] =  "El vídeo es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
         $correcto = false;
    }
    elseif ($tipoImagen != "image/jpg" && $tipoImagen != "image/jpeg") {
        $erroresFormulario[] =  "La imagen debe ser tipo jpg";
         $correcto = false;
    }
    elseif ($tipoTrailer != "video/mp4") {
        $erroresFormulario[] =  "El trailer debe ser tipo mp4";
         $correcto = false;
    }
    elseif ($tipoVideo != "video/mp4") {
        $erroresFormulario[] =  "El vídeo debe ser tipo mp4";
         $correcto = false;
    }
    
        //Ruta destino de la pelicula, donde se va a guardar
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/infocines/media/peliculas/';

        move_uploaded_file($_FILES['imagenSubida']['tmp_name'], $carpetaDestino . $nombreImagen);
        move_uploaded_file($_FILES['trailerSubida']['tmp_name'], $carpetaDestino . $nombreTrailer);
        move_uploaded_file($_FILES['videoSubida']['tmp_name'], $carpetaDestino . $nombreVideo);

        $pelicula = new TOPelicula();
        $generoPelicula = DAOGenero::getNextIdGeneroPelicula();
        $pelicula->setidPelicula(htmlspecialchars(trim(strip_tags($datos["id"]))));
        $pelicula->settitulo(htmlspecialchars(trim(strip_tags($datos["titulo"]))));
        $pelicula->setdescripcion(htmlspecialchars(trim(strip_tags($datos["descripcion"]))));
        $pelicula->setgenero($generoPelicula);
        $pelicula->setdirector(htmlspecialchars(trim(strip_tags($datos["director"]))));
        $pelicula->setanio($datos["anio"]);
        $pelicula->setpuntuacion(0);
        $pelicula->seturlTrailer('media/peliculas/'.$nombreTrailer);
        $pelicula->seturlImagen('media/peliculas/'.$nombreImagen);
        $pelicula->seturlPelicula('media/peliculas/'.$nombreVideo);

        if(DAOPelicula::create($pelicula)){
             //Insertamos los generos en la tabla intermedia
            foreach ($datos['generos'] as $idGenero) {
                $totiGenero = new TOTigenero();
                $totiGenero->setGeneroPelicula($generoPelicula);
                $totiGenero->setIdGenero($idGenero);

                DAOTigenero::create($totiGenero);
            }


            $_SESSION['subirPelicula'] = true;
            $erroresFormulario = 'peliculas';
        }
        else{
            $erroresFormulario[] = 'La película ya existe o no se puede realizar una inserción';
        }
        
    return $erroresFormulario;
    }
}
?>