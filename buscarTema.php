<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOTema as DAOTema;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<title>
		Buscar Tema
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
				<h1 class="content"> Resultados de la búsqueda:</h1>

				<?php

				   $idGrupo =  htmlspecialchars(trim(strip_tags($_GET['idGrupo'])));
				   $nombre =  htmlspecialchars(trim(strip_tags($_POST['nombre'])));
				   $temas = DAOTema::listarPorNombreYGrupo($nombre, $idGrupo);
				   
				   if($temas == NULL){
					echo "<p class='content'>No existe ningún tema en este grupo que contenga: ".$nombre."</p>";
				   }
				   else{
					for ($i=0; $i < sizeof($temas); $i++) { 
						$idTema = $temas[$i]->getidTema();
						$nomTema  = $temas[$i]->gettitulo();
						echo "<li>".$nomTema;
						echo "<button class='buttonDefault' onclick=\"location.href='temaConcreto?idTema=".$idTema."'\">Ver</button>";
						
					}
				   }

				?>
			</div>	
		</div>
	</div>
</body>
</html>