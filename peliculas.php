<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOPelicula as DAOPelicula;
use es\fdi\ucm\aw\TOPelicula as TOPelicula;
use es\fdi\ucm\aw\DAOGenero as DAOGenero;
use es\fdi\ucm\aw\TOGenero as TOGenero;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/cssPeliculas.css">
	<title>
		Películas
	</title>
</head>
<body>
	<div class="contenedor">
		<?php
		require('includes/comun/cabecera.php');
		?>
		<section class="main">
			<div class ="container">	
				<div class="flexbottomContainer">
					<?php
					if (isset($_SESSION["esAdmin"])) {
						echo '<a href="subirPelicula" class="bottomAdmin" > Añadir película </a>';
					}

					echo '<a href="buscarPelicula" class="bottomAdmin" > Buscar película </a>';
					?>
				</div>
				<?php
				$listaGenero = DAOGenero::listarGeneros();
				foreach ($listaGenero as $key) {
					$gen = $key;
					echo'<div class="grid-container">
					<div class= "item1"> '.$gen.' </div>	
					<div class="grid-subContainer">';
					$listaPeliculas = DAOPelicula::listarPeliculaxGenero($gen);	
					if(isset($listaPeliculas)){
						foreach ($listaPeliculas as $key2) {
							$peli = $key2;
							echo '<div class="grid-sub2Container">  <div class="tituloPelicula"> '. $peli->getTitulo().' </div>  <div class="imagenPelicula"> <a class="nom" href="peliculaConcreta?id='.$peli->getIdPelicula().'"> <img src=' .$peli->getUrlImagen().' alt="imagen ' . $peli->getIdPelicula().'" id="widthImg""> </a> </div> </div>';	

						}
					}
					else{
						echo 'No hay películas de éste género aún';
					}
					echo '</div> </div>';
				}
				?>
			</div>
		</div>
	</section>
</div>
</body>
</html>