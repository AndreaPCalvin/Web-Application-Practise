<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOPelicula as DAOPelicula;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/cssIndex.css">
	<title>
		InfoCines
	</title>
	<body>
		<div class="contenedor">
			<?php
			require('includes/comun/cabecera.php');
			?>
			<section class="contenido">
			<?php
				if (isset($_SESSION['usuario'])) {
					echo '<div class="logoIndex">';
					echo '<img src="media/logo.jpg" alt="logo">';
					echo '</div>';
					echo '<h1 id="TituloBienvenida">Bienvenido a Infocines ' . $_SESSION['usuario'] . '</h1>';
					echo '<h3 id="SubtituloBienvenida">Estas son las películas que te recomendamos hoy</h3>';
					
					echo '<br>';

					echo '<div class="grid-container">';
					echo '<div class="grid-subContainer" id="contenedorPelis">';
					$listaPeliculas = DAOPelicula::listarPeliculas();
					for ($i=0; $i < 4; $i++) { 
						$numeroRandom = rand(0, sizeof($listaPeliculas) - 1);
						$pelisIndex[] = $listaPeliculas[$numeroRandom];
						array_splice($listaPeliculas, $numeroRandom, 1);
					}
					rand(0, sizeof($listaPeliculas));
					
						foreach ($pelisIndex as $key2) {
							$peli = $key2;
							echo '<div class="grid-sub2Container">  
							<div class="tituloPelicula"> '. $peli->getTitulo().' </div> 
							<div class="imagenPelicula" id="imagenPeli"> 
							<a class="nom" href="peliculaConcreta?id='.$peli->getIdPelicula().'"> 
							<img src=' .$peli->getUrlImagen().' alt="imagen ' . $peli->getIdPelicula().'" id="widthImg""> </a>
							</div>
							</div>';	

							}
						
					echo '</div></div>';
				}
				else {
					echo '<div class="logoIndex">';
					echo '<img src="media/logo.jpg" alt="logo">';
					echo '</div>';
					echo '<h1 id="TituloBienvenida">Bienvenido a Infocines</h1>';
					echo '<h3 id="SubtituloBienvenida">Su nuevo cine online con todas las películas de la actualidad y del pasado</h3>';

					echo '<div class="logoIndex">';
					echo '<img src="media/fondoPalomitas.jpg" alt="fondoPalomitas">';
					echo '</div>';


					echo '<div class="row">
					<div class="column">
					<p>En infocines disfrutarás de las películas de las que todo el mundo habla y podrás descubrir
					otros géneros que nunca habrías visto.</p>
					</div>
					<div class="column">
					<div class="imagenPelis">
					<a href="peliculas"><img id="imgPelis" src="media/fondoDerechaPelisIndex.png" alt="fondoPeliculas"></a>
					</div>
					</div>
				  </div>';

				  echo '<h1 id="FAQ">FAQ</h1>';

					echo '<button class="accordion">¿Qué es Infocines?</button>
					<div class="panel">
					  <p>Es una página realizada por estudiantes de la Universidad Complutense de Madrid para ofrecer el mejor servicio
					  de visionado y foros de películas.</p>
					</div>';

					echo '<button class="accordion">¿Qué servicios ofrece?</button>
					<div class="panel">
					  <p>Nuestra página ofrece tanto el visionado como la descarga de películas, valoraciones, comentarios... Así como
					  un foro donde poder comentar temas sobre las películas y los próximos eventos.</p>
					</div>';

					
					echo '<button class="accordion">¿Cuál es el precio de Infocines?</button>
					<div class="panel">
					  <p>La lista de precios es la siguiente:
					  <ul>
					  <li>
					  Mensual: 15€
					  </li>
					  <li>
					  Trimestral: 40€
					  </li>
					  <li>
					  Anual: 150€
					  </li>
					  </ul></p>
					</div>';
					
					
				}

			?>
			</section>
		</div>
	</body>
	</html>