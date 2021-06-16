<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOEvento as DAOEvento;
use es\fdi\ucm\aw\TOEvento as TOEvento;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>	
	<script src="js/calendario.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">	
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/calendario.css">	
	<title>Calendario</title>
	
	<script>
		$(document).ready(function () {
					
			dataMisEventos= [

			<?php
				$listaEventos = DAOEvento::listarEventos();
				$event = new TOEvento();
				foreach ($listaEventos as $key) {
					$event = $key;
			?>
					{
						title: "<?= $event->getTitulo() ?>",
						start:   new Date("<?= $event->getFecha()?>"),
						end:   new Date("<?=  $event->getFecha()?>"),
						url: "<?= "foro_eventos_noticia?id=".$event->getIdEvento() ?>",
					},                
				<?php } ?>
			]
		});

	</script>
	<script src="js/infoCalendario.js"></script>

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
				<h1 class="content">Bienvenido al calendario de eventos</h1>					
				<div id='wrap'>
					<div id='calendar'></div>
					<div style='clear:both'></div>					
				</div>						
			</div>
		</div>	
	</div>
</body>
</html>