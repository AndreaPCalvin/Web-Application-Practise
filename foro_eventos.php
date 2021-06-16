<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOEvento as DAOEvento;
use es\fdi\ucm\aw\TOEvento as TOEvento;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/eventos.css">
	<title>
		Eventos
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
			<h1 class="content">Próximos eventos cinematográficos: </h1>
				<div class='caja'>
					<h2> Ordenar por: </h2>
					<form method="GET">
					
					<select id="orden" name="orden" class="select-css">
						<option value="pred" selected>Predeterminado </option>;
						<option value="fechaAsc" >Fecha ascendente</option>;
						<option value="fechaDesc" >Fecha descendiente</option>;
						<option value="rankingDesc" >Mejor valorados</option>;
						<option value="rankingAsc" >Peor valorados</option>;
					</select>
					
					
					<input type="submit" name="enviar" value="Ordenar" class="buttonCE">
					</form>
			           
			<?php	
				
				if(isset($_GET["enviar"])){
					$miOrden = htmlspecialchars(trim(strip_tags($_GET["orden"])));
					if($miOrden == "fechaAsc"){
						echo 'Los eventos aparecen ordenados por fecha ascendente';
						$listaEventos = DAOEvento::listarEventosFechaAsc();
					}
					else if($miOrden == "fechaDesc"){
						echo 'Los eventos aparecen ordenados por fecha descendente';
						$listaEventos = DAOEvento::listarEventosFechaDesc();
					}
					else if($miOrden == "pred"){
						echo 'Mostrando orden predeterminado';
						$listaEventos = DAOEvento::listarEventos();
					}
					else if($miOrden == "rankingDesc"){
						echo 'Mostrando según mejor puntuación';
						$listaEventos = DAOEvento::listarEventosMejorValorados();
					}
					else if($miOrden == "rankingAsc"){
						echo 'Mostrando según peor puntuación';
						$listaEventos = DAOEvento::listarEventosPeorValorados();
					}
				}
				else{
					echo 'Los eventos se muestran de forma predeterminada, pruebe a ordenarlos';
					$listaEventos = DAOEvento::listarEventos();
				}
			
				echo '<h2>Busca eventos con filtros: ';
				echo '<button class="buttonCE" onclick="location.href=\'buscarEvento\'">Buscar</button></h2>';
				
				if (isset($_SESSION["esAdmin"])) {
					echo '<h2>Sube eventos a la página: ';
					echo '<button class="buttonCE" onclick="location.href=\'subirNoticias\'">Añadir</button></h2>';
				}
				
				echo '</div>';	
				
				$numEventos = DAOEvento::getRowCount();
				if($numEventos > 0){
				
					$event = new TOEvento();
			
					foreach ($listaEventos as $key) {
						echo '<div class="marco">';
						$event = $key;
						echo '<h2 class="content" id="highlight">'.$event->getTitulo().'</h2>';
						echo '<a href="foro_eventos_noticia?id='.$event->getIdEvento().'"> 
						<img class="miImagen" src=' . $event->getUrlImagen().' alt="imagen ' . $event->getTitulo().'" > </a> ';	
						echo '</div>';
					}
				}
				else{
					echo '<h2 class="content">Aún no hay eventos.</h2>';
					echo '<p class="content">¡Estate pendiente porque pronto publicaremos nuestros próximos eventos!</p>';
				}
			?>	
			
			
		</div>
	</div>
</div>



</body>
</html>