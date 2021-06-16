<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOComentario as DAOComentario;
use es\fdi\ucm\aw\Usuario as Usuario;
use es\fdi\ucm\aw\TOComentario as TOComentario;

function addComentario(){
    $error = '';
$contenidoComentario = '';

if (empty($_POST['texto'])) {
    $error .= '<p> Se debe introducir contenido en el comentario</p>';
}
else {
    $contenidoComentario = $_POST['texto'];
}

if($error == '')
{
    $comentario = new es\fdi\ucm\aw\TOComentario();

	$comentario->setidComentarioPadre($_POST['idComentario']);
	$comentario->settexto($contenidoComentario);
	$comentario->setidUsuario($_POST['usuario']);
	$comentario->setidPelicula($_POST['idPelicula']);
    
    if(es\fdi\ucm\aw\DAOComentario::create($comentario)){
        $error = '<label class="exito"> Comentario añadido </label>';
    }
    else {
        $error = '<label class="exito"> Error al añadir comentario </label>';
    }
    
}

$data = array(
    'error' => $error
);

echo json_encode($data);

}


function buscarComentario(){
$salida = '';
$idPelicula = $_POST['idPelicula'];

$resultado = DAOComentario::readComentariosPelicula(0, $idPelicula);
if (isset($resultado)) {
    foreach ($resultado as $fila){
        $user = Usuario::buscaUsuario($fila->getIdUsuario());
        $salida .= '<img src=' . $user->geturlFoto() . ' alt="imagen ' . $user->getApodo() . '" id="avatar"">';
        $salida .= '<div class = "panelComentario">';
        
        $salida .=  '<div class = "cabeceraComentario">' . $fila->getIdUsuario() . ' <span> '. $fila->getfecha() . '</span> <button type="button" id="'.$fila->getidComentario() . '" class ="responder"> <img src="media/responder.png" alt="imagen" id="iconoResponder""></button></div> <div class="contenidoComentario">' . $fila->getTexto() . ' </div>';
        $salida .= '</div>';
    
        $salida .= cogerRespuestasAComentarios($fila->getidComentario());
    }
}


echo $salida;
}


function cogerRespuestasAComentarios($idPadre = 0, $margen = 0){
    $resultado = DAOComentario::readRespuestas($idPadre);
    if($idPadre == 0){
        $margen = 0;
    }
    else {
        $margen = $margen + 50;
    }
    $salida = '';
    if (isset($resultado)){
        foreach ($resultado as $fila) {
            $user = Usuario::buscaUsuario($fila->getIdUsuario());
            $salida .= '<img src=' . $user->geturlFoto() . ' alt="imagen ' . $user->getApodo() . '" id="avatar"" style="margin-left:'.$margen.'px">';
            $salida .= '<div class = "panelComentario" style="margin-left:'.$margen.'px">';
          $salida .=  '<div class = "cabeceraComentario">' . $fila->getIdUsuario() . ' <span> '. $fila->getfecha() . '</span> <button type="button" id="'.$fila->getidComentario() . '" class ="responder"> <img src="media/responder.png" alt="imagen" id="iconoResponder""></button></div> <div class="contenidoComentario">' . $fila->getTexto() . ' </div>';
        $salida .= '</div>';
            $salida .= cogerRespuestasAComentarios($fila->getidComentario(), $margen);
        }
    }
    return $salida;

}

//LLamamos a las funciones según qué queremos hacer
if(isset($_POST['accionComentario']) && !empty($_POST['accionComentario'])) {
    $accion = $_POST['accionComentario'];
    switch($accion) {
        case 'addComentario' : addComentario();break;
        case 'buscarComentario' : buscarComentario();break;
    }
}


?>