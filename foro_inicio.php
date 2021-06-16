<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/bienvenidaForo.css">
	<title>
		Foro Inicio
	</title>
</head>
<body id="foro">
<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>
	
		<div class="principal">
			<div class="nav">
				<?php
					require('includes/comun/menu_foro.php');
				?>
			</div>
		
			<div class="content">
				
					<img class="welcomeImg" src="media/css/bienvenido.jpg" alt="bienvenido">
			
					<h2 class="content">Si te gusta comentar y opinar sobre películas, actores y los últimos estrenos en español entonces 
					has llegado al lugar ideal.</h2>
					<p class='rulesTitle'> Estas son las reglas de oro del foro: </p>
					<ol>
						<p class="rules">Reglas</p>
						<li>No está permitido hacer comentarios ofensivos sobre otros usuarios del foro ni se tolerarán las amenazas.</li>
						<li>No se pueden emplear palabras malsonantes en el foro.</li>
						<li>No hables de temas controvertidos que puedan crear discusiones como la política, religión...</li>
					</ol>
			</div>
		</div>

</div>
</body>
</html>