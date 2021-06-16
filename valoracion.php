<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOValoracion as DAOValoracion;
use es\fdi\ucm\aw\TOValoracion as TOValoracion;
use es\fdi\ucm\aw\DAOPelicula as DAOPelicula;

if(!empty($_POST['idPelicula']) && !empty($_POST['idUsuario']) && !empty($_POST['ratingNum'])){ 

    $tValoracion = new TOValoracion();
	$tValoracion->setValoracion(intVal($_POST['ratingNum']));
	$tValoracion->setIdPelicula($_POST['idPelicula']);
	$tValoracion->setIdUsuario($_POST['idUsuario']);

	$status = DAOValoracion::comparar($tValoracion);

	if($status == 1){

		$ok = DAOValoracion::create($tValoracion);
	}
    
	$media = DAOValoracion::media($tValoracion);

	$response = array( 
        'data' => $media,
        'status' => $status 
    );

	echo json_encode($response);     

} 
else{
    $status = 3;
    $response = array( 
        'status' => $status 
    );
    echo json_encode($response); 
}
?>
