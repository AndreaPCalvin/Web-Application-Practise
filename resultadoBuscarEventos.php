<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOEvento as DAOEvento;
	use es\fdi\ucm\aw\FormBuscadorEventos as FormBuscadorEventos;
	$form = new FormBuscadorEventos;
	$html = $form->gestiona();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/busquedaEventos.css">
	<title>
		Eventos buscados
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

<?php

            $titulo = isset($_GET['titulo']) ? htmlspecialchars(trim(strip_tags($_GET["titulo"]))) : '';
			$fecha = isset($_GET['fecha']) ? htmlspecialchars(trim(strip_tags($_GET["fecha"]))) : '';
			$lugar = isset($_GET['lugar']) ? htmlspecialchars(trim(strip_tags($_GET["lugar"]))) : '';
			$categoria = isset($_GET['categoria']) ? htmlspecialchars(trim(strip_tags($_GET["categoria"]))) : '';
			
            $misEventos = DAOEvento::buscarEvento($titulo, $lugar, $fecha, $categoria);
            
            @$numResults= sizeof($misEventos);	
		
		if($numResults>1){
			echo "<p>Hay ".$numResults." eventos que contienen los elementos de su búsqueda</p>";
		}
		else if ($numResults == 1){
			echo "<p>Hay 1 evento que contiene los elementos de su búsqueda</p>";
		}
		else if($numResults==0){
			echo'<h2>Lo sentimos, no hay eventos con los parámetros establecidos. Pruebe con otros parámetros:</h2>';
			echo $html;
		}
		
		if($numResults>0){
			
			echo  "<div class='cuadriculaBE'>";
			
				echo  "<div> Título </div>";
				echo  "<div> Fecha </div>";
				echo  "<div> Categoría </div>";
				echo  "<div> Lugar </div>";
				echo  "<div> Ir al evento </div>"; 
			
			
			for($i=0; $i<$numResults;$i++)
			{
					echo  "<div >".$misEventos[$i]->getTitulo()."</div>";
					echo  "<div > ".$misEventos[$i]->getFecha()."</div>";
					echo  "<div > ".$misEventos[$i]->getCategoria()."</div>";
					echo  "<div > ".$misEventos[$i]->getCiudad().", ".$misEventos[$i]->getPais()."</div>";
					echo  "<div><a href='foro_eventos_noticia?id=".$misEventos[$i]->getIdEvento()."'>Ver</a></div>";
			}
			echo  "</div>";
		}
            ?>
			</div>
		</div>
	</div>
</body>
</html>