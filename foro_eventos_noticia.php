<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOEvento as DAOEvento;
use es\fdi\ucm\aw\TOEvento as TOEvento;
use es\fdi\ucm\aw\DAOMeGusta as DAOMeGusta;
use es\fdi\ucm\aw\TOMeGusta as TOMeGusta;
use es\fdi\ucm\aw\DAORanking as DAORanking;
use es\fdi\ucm\aw\TORanking as TORanking;

$idEvento = $_GET["id"];
$infoEvento = new TOEvento();
$infoMeGusta = new TOMeGusta();
$infoEvento = DAOEvento::read($idEvento);
$numLikes = DAOMeGusta::getNumLikes($idEvento);
$notaMedia = DAORanking::getNotaMedia($idEvento);
$fechaEvento = $infoEvento->getFecha();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Evento</title>
	<link rel="stylesheet" type="text/css" href="css/likeRankingCuentaAtras.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function () {
		notaMedia = <?= $notaMedia?>;
		idevento = <?= $idEvento?>;
		fechaEvento = new Date('<?= $fechaEvento?>').getTime();
	});
	</script>
	<script src="js/foro_eventos_noticia.js"></script>

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
		<div id="content">
			<h1 class="content"> <?= $infoEvento->getTitulo() ?> </h1>
			<div id="evento">
			<?php
				if(isset($_SESSION["login"])) {
					
					$idUsuario = $_SESSION['usuario'];
					$infoMeGusta->setIdEvento($idEvento);
					$infoMeGusta->setIdUsuario($idUsuario);
					$meGustaStorage = DAOMeGusta::read($infoMeGusta);
				
			?>

			<div class="contHeart">
				<div class="heart 
				<?php
					if($meGustaStorage->num_rows > 0){
						echo ' heart-blast';
					}
				?>	
				">Me gusta</div>
				
					<div class="ranking"> 
						<p class="ranking">Valoración</p>
						<span class="fa fa-star" id="s1" value="20"></span>
						<span class="fa fa-star" id="s2" value="40"></span>
						<span class="fa fa-star" id="s3" value="60"></span>
						<span class="fa fa-star" id="s4" value="80"></span>
						<span class="fa fa-star" id="s5" value="100"></span>
					</div>
					
					<div class="cuentaAtras">					
						<p class="cuentaAtras"> Días restantes </p>
						<p id="cuentaAtras"></p>
					</div>
					
				</div>
			<?php	
				echo '<p id="like"><a href="verLikes?id='.$idEvento.'">Ver</a> '. ' <span id="counterLikes">'. $numLikes .'</span> likes</p>';
				
			}
			?>
			<h2 class="content"> Este evento tendrá lugar el <?=$infoEvento->getFecha() ?> 
				 en  <?=$infoEvento->getCiudad()?>,  <?=$infoEvento->getPais()?></h2>
			<img class="miImagen" src="<?=$infoEvento->getUrlImagen()?>">
			<p class="content"><?= $infoEvento->getDescripcion() ?></p>
			</div>
			
		</div>

	</div>
</div>
</body>
</html>