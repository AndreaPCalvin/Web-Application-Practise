<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormSubidaPelicula as FormSubidaPelicula;

$form = new FormSubidaPelicula();
$html = $form->gestiona();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/editCuenta.css">
	<title>Subir pelicula</title>
</head>
<body>
	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>

<section class="contenido">
<section class="contenidoCuenta">

<?= $html ?>

	<?php

		

		if(!isset($_SESSION["login"])){
			header("location:index");
			
			echo "<p>Por favor <a href=\"login\">inicie sesión </a></p>";
		}

	?>

</section>
</section>
</div>
</body>
</html>