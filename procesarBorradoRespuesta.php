<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAORespuesta as DAORespuesta;
use es\fdi\ucm\aw\TORespuesta as TORespuesta;

if (!isset($_SESSION["login"])) {
	header("location:index");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Crear Respuesta</title>
</head>
<body>

	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>
	<section class="main">
	<?php
		require('includes/comun/menu_foro.php');
	?>

	
	<?php

			$idTema = $_GET['tema'];
			$idRespuesta = $_GET["id"];

			  $borrado = DAORespuesta::delete($idRespuesta);
			  if ($borrado) {
			  	header("location:temaConcreto");
			  	#echo "Añadido el comentario";
			  } else {
			  	echo "Error, no se ha podido borrado la respuesta";
			  }
			  
	?>

</section>
</div>

</body>
</html>