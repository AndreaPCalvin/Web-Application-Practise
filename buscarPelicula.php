<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormBuscarPelicula as FormBuscarPelicula;



		$form = new FormBuscarPelicula();
		$html = $form->gestiona();

	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/editCuenta.css">
	<title>Buscar pelicula</title>
</head>
<body>	
	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>

<section class="contenido">
<section class="contenidoCuenta">

	
<?= $html ?>

</section>
</section>
</div>
</body>
</html>