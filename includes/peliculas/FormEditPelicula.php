<?php
namespace es\fdi\ucm\aw;
/**
 * 
 */
class FormEditPelicula extends Form
{
    public function __construct()
    {
        parent::__construct('FormEditPelicula');
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
        $pelicula = DAOPelicula::read($_SESSION['pelicula']);
        $resultado = '
        <div class="login">
        <div class="login-header">
        <h1>Editar película</h1>
        </div>
        <input type="hidden" name="id" value="'.$pelicula->getIdPelicula().'">
        <div class="login-form">
        <table>
            <tr>
                <td>
                    <label>Nombre:</label>
                </td>
                <td>
                    <input type="text" name="titulo" value="'. $pelicula->getTitulo() .'">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Descripción:</label><br>
                </td>
                <td>
                    <textarea name="descripcion" minlength="50" maxlength="10000"  cols="30" rows="5" >' . $pelicula->getDescripcion() . '</textarea>
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
                    if(DAOGenero::comprobarGeneroPelicula($genero->getIdGenero(), $pelicula->getIdPelicula())){
                        $resultado .= '<option value="' . $genero->getIdGenero() . '" selected>' . $genero->getTipo() . '</option>';
                    }
                    else{
                        $resultado .= '<option value="' . $genero->getIdGenero() . '" >' . $genero->getTipo() . '</option>';
                    }
                    
                }
            $resultado .= '
                
                </select>
                </td>
            </tr>
                
            <tr>
                <td>
                    <label>Director:</label>
                </td>
                <td>
                    <input type="text" name="director" value="'. $pelicula->getDirector() .'">
                </td>
            </tr>


            <tr>
                <td>
                    <label>Año:</label>
                </td>
                <td>
                    <input type="number" min="1900" max="2099" step="1"  name="anio" value="'. $pelicula->getAnio() .'">
                </td>
            </tr>

            
            <tr>
                <td>
                    <label>Imagen: (tamaño máximo ' .pow(2, 30)/pow(2, 30) . 'GB)</label>
                </td>
                <td>
                    <input type="file" name="imagenSubida" accept="image/*">
                </td>
            </tr>


            <tr>
                <td>
                    <label>Trailer: (tamaño máximo' . pow(2, 30)/pow(2, 30) . 'GB)</label>
                </td>
                <td>
                    <input type="file" name="trailerSubida" accept="video/*" >
                </td>
            </tr>


            <tr>
                <td>
                    <label>Vídeo: (tamaño máximo' . pow(2, 30)/pow(2, 30) . 'GB)</label>
                </t>
                <td>
                    <input type="file" name="videoSubida" accept="video/*" >
                </td>
            </tr>
        </table> 

            <button type="submit" name="editPelicula">Subir</button> 
            </div></div>';
				
    return $resultado;
    }

    protected function procesaFormulario($datos)
    {

        if (!isset($datos['editPelicula']) ) {
            header('Location: peliculas');
            exit();
        }
    	$erroresFormulario = array();
        $correcto = true;

        $id = isset($datos['id']) ? htmlspecialchars(trim(strip_tags($datos['id']))) : null;

        if (!$id ) {
            $erroresFormulario[] = 'El id introducido no es válido';
            $correcto = false;
        }

         $titulo = isset($datos['titulo']) ? htmlspecialchars(trim(strip_tags($datos['titulo']))) : null;

        if (!$titulo ) {
            $erroresFormulario[] = 'El titulo introducido no es válido';
            $correcto = false;
        }

         $descr = isset($datos['descripcion']) ? htmlspecialchars(trim(strip_tags($datos['descripcion']))) : null;

        if (!$descr ) {
            $erroresFormulario[] = 'La descripcion introducida no es válido';
            $correcto = false;
        }

        $generos = isset($datos['generos']) ?$datos['generos'] : null;
       


         $director = isset($datos['director']) ? htmlspecialchars(trim(strip_tags($datos['director']))) : null;

        if (!$director ) {
            $erroresFormulario[] = 'El director introducido no es válido';
            $correcto = false;
        }

         $anio = isset($datos['anio']) ? htmlspecialchars(trim(strip_tags($datos['anio']))) : null;

         if (!$anio ) {
            $erroresFormulario[] = 'El año introducido no es válido';
            $correcto = false;
        }
                
        $nombreImagen = isset($_FILES['imagenSubida']['name']) ? htmlspecialchars(trim(strip_tags($_FILES['imagenSubida']['name']))) : null;
    //Recibimos datos del video
        if (mb_strlen($nombreImagen) > 0) {
            $tipoImagen = $_FILES['imagenSubida']['type'];
            $sizeImagen = $_FILES['imagenSubida']['size'];
            if($tipoImagen != "image/jpg" && $tipoImagen != "image/jpeg"){
                $erroresFormulario[] = 'La imagen debe ser jpeg o jpg';
                $correcto = false;
            }
            if ($sizeImagen > pow(2, 30)) {
                $erroresFormulario[] = "La imagen es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
                $correcto = false;
            }
        }

         $nombreTrailer = isset($_FILES['trailerSubida']['name']) ? htmlspecialchars(trim(strip_tags($_FILES['trailerSubida']['name']))) : null;

        if (mb_strlen($nombreTrailer) > 0) {
            $tipoTrailer = $_FILES['trailerSubida']['type'];
            $sizeTrailer = $_FILES['trailerSubida']['size'];
            if($tipoTrailer != "video/mp4"){
                 $erroresFormulario[] =  "El trailer debe ser tipo mp4";
                $correcto = false;
            }
            if ($sizeTrailer > pow(2, 30)) {
               $erroresFormulario[] =  "El trailer es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
                $correcto = false;
            }
        }

         $nombreVideo = isset($_FILES['videoSubida']['name']) ? htmlspecialchars(trim(strip_tags($_FILES['videoSubida']['name']))) : null;

        if (mb_strlen($nombreVideo) > 0) {
            $tipoVideo = $_FILES['videoSubida']['type'];
            $sizeVideo = $_FILES['videoSubida']['size'];
            if($tipoVideo != "video/mp4"){
                 $erroresFormulario[] =  "El vídeo debe ser tipo mp4";
                $correcto = false;
            }
            if ($sizeVideo > pow(2, 30)) {
                $erroresFormulario[] =  "El vídeo es demasiado grande, tamaño máximo : " . pow(2, 30)/pow(2, 30) . "GB";
                $correcto = false;
            }
        }

        if($correcto){

            $pelicula = DAOPelicula::read($id);
            if(mb_strlen($titulo) > 0){
                $pelicula->settitulo(htmlspecialchars(trim(strip_tags($titulo))));
            }
            if(mb_strlen($descr) > 0){
                $pelicula->setdescripcion(htmlspecialchars(trim(strip_tags($descr))));
            }
            if(mb_strlen($director) > 0){
                $pelicula->setdirector(htmlspecialchars(trim(strip_tags($director))));
            }
            if(mb_strlen($anio) > 0){
                $pelicula->setanio($anio);
            }
            $generosDistintos = false;
            foreach ($generos as $idGenero) {
                if (!DAOGenero::comprobarGeneroPelicula(intval($idGenero), $pelicula->getIdPelicula())) {
                    $generosDistintos = true;
                }
            }

            if ($generosDistintos) {
                DAOTigenero::deleteGenerosPeli($pelicula->getGenero());

                foreach ($generos as $idGenero) {
                    $totiGenero = new TOTigenero();
                    $totiGenero->setGeneroPelicula($pelicula->getGenero());
                    $totiGenero->setIdGenero($idGenero);
    
                    DAOTigenero::create($totiGenero);
                }

            }

            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/infocines/media/peliculas/';

            if(mb_strlen($nombreImagen) > 0){
                move_uploaded_file($_FILES['imagenSubida']['tmp_name'], $carpetaDestino . $nombreImagen);
                    $nuevoNombre = $carpetaDestino;
                    $nuevoNombre .= $id;
                    $nuevoNombre .= 'Imagen.';
                    $nuevoNombre .= pathinfo($nombreImagen, PATHINFO_EXTENSION);
                    rename($carpetaDestino.$nombreImagen, $nuevoNombre);
                $pelicula->seturlImagen('media/peliculas/'.$id . "Imagen." . pathinfo($nombreImagen, PATHINFO_EXTENSION));
            }

            if(mb_strlen($nombreTrailer) > 0){
                move_uploaded_file($_FILES['trailerSubida']['tmp_name'], $carpetaDestino . $nombreTrailer);
                    $nuevoNombre = $carpetaDestino;
                    $nuevoNombre .= $id;
                    $nuevoNombre .= 'Trailer.';
                    $nuevoNombre .= pathinfo($nombreTrailer, PATHINFO_EXTENSION);
                    rename($carpetaDestino.$nombreTrailer, $nuevoNombre);
                $pelicula->seturlTrailer('media/peliculas/'.$id . "Trailer." . pathinfo($nombreTrailer, PATHINFO_EXTENSION));
            }

            if(mb_strlen($nombreVideo) > 0){
                move_uploaded_file($_FILES['videoSubida']['tmp_name'], $carpetaDestino . $nombreVideo);
                    $nuevoNombre = $carpetaDestino;
                    $nuevoNombre .= $id;
                    $nuevoNombre .= 'Video.';
                    $nuevoNombre .= pathinfo($nombreVideo, PATHINFO_EXTENSION);
                    rename($carpetaDestino.$nombreVideo, $nuevoNombre);
                $pelicula->seturlPelicula('media/peliculas/'.$id . "Video." . pathinfo($nombreVideo, PATHINFO_EXTENSION));        
            }


            if(DAOPelicula::update($pelicula)){
                $_SESSION['editPelicula'] = true;
                $erroresFormulario = 'peliculas';
            }
            else{
                $erroresFormulario[] = 'Error al modificar la película';
            }
        }   

    return $erroresFormulario;
    }
}
?>