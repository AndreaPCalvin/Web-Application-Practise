<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOPelicula as DAOPelicula;
use es\fdi\ucm\aw\TOPelicula as TOPelicula;
use es\fdi\ucm\aw\DAOActuaciones as DAOActuaciones;
use es\fdi\ucm\aw\TOActuaciones as TOActuaciones;
use es\fdi\ucm\aw\DAOActor as DAOActor;
use es\fdi\ucm\aw\TOActor as TOActor;
use es\fdi\ucm\aw\DAOGenero as DAOGenero;
use es\fdi\ucm\aw\TOGenero as TOGenero;
use es\fdi\ucm\aw\Usuario as Usuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="js/pelicula.js"></script>

	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/cssPeliculas.css">
	<title>Película</title>
</head>
<body>
	<div class="contenedor">
		<?php
		require('includes/comun/cabecera.php');
		?>
		<section class="main">

			<?php
			$infoPelicula = DAOPelicula::read($_GET["id"]);
			$listaActuaciones =DAOActuaciones::listar($_GET["id"]);
			$listaActores = DAOActor::listar($_GET["id"]);
			$listaGeneros = DAOGenero::readGenero($_GET["id"]);
			if(isset($_SESSION["login"])){
				$user = Usuario::buscaUsuario($_SESSION['usuario']);
			}
			$_SESSION['pelicula'] = $infoPelicula->getIdPelicula();
			?>
			<div class="gridPeliContainer">
				<div class="flexbottomContainer">
					<?php

					if (isset($_SESSION['esAdmin'])) {
						echo '  
						<a href="editarPelicula" class="bottomAdmin" > Editar pelicula</a>
						<a href="borrarPelicula?id='.$infoPelicula->getIdPelicula().'" class="bottomAdmin" > Eliminar película </a>';
					}
					?>
				</div>
				<?php
				echo '<div id="nombrePeli">' . $infoPelicula->getTitulo() . '</div>';
				?>
				<div class="grid-PelisubContainer1">
					<?php
					( isset($_SESSION["login"]))? $nomUser = $_SESSION['usuario'] : $nomUser = '';
					( $infoPelicula->getPuntuacion() >= 5 )?  $val5 = 'checked ="checked"' : $val5 = '' ;
					( $infoPelicula->getPuntuacion() >= 4 && $infoPelicula->getPuntuacion() < 5)?  $val4 ='checked ="checked"' : $val4 = '' ;
					( $infoPelicula->getPuntuacion() >= 3 && $infoPelicula->getPuntuacion() < 4)?  $val3 = 'checked ="checked"' : $val3 = '' ;
					( $infoPelicula->getPuntuacion() >= 2 && $infoPelicula->getPuntuacion() < 3)?  $val2 = 'checked ="checked"' :$val2 =  '' ;
					( $infoPelicula->getPuntuacion() >= 1 && $infoPelicula->getPuntuacion() < 2)?  $val1 = 'checked ="checked"' : $val1 = '' ;

					echo '<div class="grid-inPelisubContainer1">
							<div class="flexsubContainer1"> 
								<img src=' . $infoPelicula->getUrlImagen() . ' alt="imagen ' . $infoPelicula->getIdPelicula() . '"id="widthImgPel"> 
							</div>
							<div class="flexsubContainer1"> Valoración media: '.$infoPelicula->getPuntuacion().'</div>
								<div class="flexsubContainer1">
									<form>
										<p class="rate">
										<input type="hidden" id="idPelicula" name="idPelicula" value="'.$infoPelicula->getIdPelicula().'">
										<input type="hidden" id="usuario" name="usuario" value="' . $nomUser . '">
										<input type="radio" id="star5" name="estrellas" value= 5 '. $val5 .'>
										<label for="star5"> &#9733; </label>
										<input type="radio" id="star4" name="estrellas" value= 4 '. $val4 .'>
										<label for="star4"> &#9733;</label>
										<input type="radio" id="star3" name="estrellas" value= 3 '. $val3 .'>
										<label for="star3"> &#9733;</label>
										<input type="radio" id="star2" name="estrellas" value= 2 '. $val2 .'>
										<label for="star2"> &#9733;</label>
										<input type="radio" id="star1" name="estrellas" value= 1 '. $val1 .'>
										<label for="star1"> &#9733;</label>
										</p>
									</form>
								</div>
						</div>';

					echo '<div class="grid-inPelisubContainer1"> 
							<p> Director: '.$infoPelicula->getDirector().'. <br><br>
							Género: '; foreach ($listaGeneros as $value) {
											echo ' | '.$value;

										}
										echo ' | ';
					echo '<br><br> Año de estreno: '.$infoPelicula->getAnio().'.';
					echo '<br><br> Sinopsis: '. $infoPelicula->getDescripcion() . '</p>

						</div>';

					?>
				</div>
				<div class="grid-PelisubContainer2">

					<?php
					echo '<div class="flexTrailer"><video controls id="trailer"> <source src="' . $infoPelicula->getUrlTrailer() . '" type="video/mp4">Video no soportado </video> </div>';
					?>

					<div class= "flexdireccion"> 

						<?php

						if(isset($listaActores)){
							foreach ($listaActores as $infoActor) {
								echo '<div class= "flexReparto"> '.$infoActor->getNombre().' 
								<div class= "flexReparto"> <img src=' . $infoActor->getImagen() . ' alt="imagen ' . $infoActor->getIdActor() . '" id="widthImgAct""> </div> ('.$listaActuaciones[$infoActor->getIdActor()]->getPersonaje() .') 
								</div>';
							}
						}
						?>

					</div>

					<?php
					if (isset($_SESSION["login"])) {
						echo '<div class= "flexdireccion">  
						<div> 
							<img src="media/flecha1.gif" alt="imagen">
							<a href="verPelicula?id='.$infoPelicula->getIdPelicula().'" id="bottom_ver" > Ver pelicula </a> 
						</div>';
						echo '<div> 
								<a href="/infocines/'.$infoPelicula->getUrlPelicula().'" download='.$infoPelicula->getIdPelicula().'.mp4 " id="bottom_descargar"> Descargar </a> 
								<img src="media/flecha2.gif" alt="imagen">
							</div> 
						</div>';
					}
					else{
						echo '<p>Para ver la película, descargar y ver los comentarios debe <a href="login">iniciar sesión </a></p>';
					}
					?>
				</div>		
				<div class="grid-PelisubContainer3">
					<h2>Comentarios</h2>
					<?php if (isset($_SESSION["login"])) { ?>	
						<h3>Enviar comentario: </h3>

						<form method="post" id="formComentario">
							<fieldset>

								<table>
									<tr>
										<td>
											<label for="texto"> <?php echo'<img src=' . $user->geturlFoto() . ' alt="imagen ' . $user->getApodo() . '" id="avatar"">'; ?> </label>
										</td>
										<td>
											<textarea id="texto" placeholder="Introduce tu comentario sobre la película" name="texto" rows="5" style="width: 919px; height: 76px;"></textarea>
										</td>
									</tr>
								</table>
								<input type="hidden" value="0" name="idComentario" id="idComentario">
								<input type="hidden" id="idPelicula" name="idPelicula" value="<?php echo $infoPelicula->getIdPelicula()?>">
								<input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario']?>">
								<input type="hidden" id="accionComentario" name="accionComentario" value="addComentario">
								<button type="submit" name="comentar" id="botonComentarios"> Comentar </button>
								<button type="reset" name="limpiar"  id="botonComentarios"> Limpiar </button>

							</fieldset></form>

							<span id="mensajeComentario"></span>
							<div id="mostrarComentario"></div>

							<script>cargarComentario();</script>

						<?php } else{
							echo '<p> Si quiere comentar y ver los comentarios, <a href="login">inicie sesión </a></p> <br>';
						}	?>
					</div>
				</div>
			</section>
		</div>
	</body>
	</html>