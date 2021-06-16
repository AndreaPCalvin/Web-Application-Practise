<?php 

require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOEvento as DAOEvento;
use es\fdi\ucm\aw\TOEvento as TOEvento;
use es\fdi\ucm\aw\DAOMeGusta as DAOMeGusta;
use es\fdi\ucm\aw\TOMeGusta as TOMeGusta;
use es\fdi\ucm\aw\DAOUsuario as DAOUsuario;
use es\fdi\ucm\aw\TOUsuario as TOUsuario;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">	
	<link rel="stylesheet" type="text/css" href="css/visualizarLikes.css">
	<title>Lista miembros</title>
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
			if (isset($_SESSION['usuario'])){
				$idEvento = $_GET["id"];
				$infoEvento = new TOEvento();
				$infoEvento = DAOEvento::read($idEvento);
				
				echo '<h1 class="content">' . $infoEvento->getTitulo().'</h1>';
				$apodoUsers = DAOMeGusta::listarUsuariosMG($idEvento);
				@$n = sizeof($apodoUsers);
				if($n > 0){
					echo '<h2 class="content">Le ha gustado a:</h2>';
					echo '<div class="cuadricula">';
					for ($i=0; $i < $n; $i++) { 
						$usuario = new TOUsuario();
						$usuario = DAOUsuario::read($apodoUsers[$i]);
						echo '<div>'. $usuario->getApodo(). '';
						echo '<img id="like" src="'. $usuario->geturlFoto() . '" alt="imagen de '.$usuario->getApodo() .'"></div>';
						
					}
					echo '</div>';
				}
				else{
					echo '<h2 class="content">Aún nadie ha dado me gusta a este evento</h2>';
					echo '<h2 class="content">¡Sé el primero en indicar que te gusta!</h2>';
				}
			}
			else{
				echo '<h2 class="content">Si no has iniciado sesión, no puedes acceder a esta página.</h2>';
				echo '<h2 class="content">¿Qué estás intentando...?</h2>';
				echo '<img src="media/css/nopermiso.png" alt="Crackear está feo" style="width:700px;">';
			}
			?>
</div>
</div>
</div>

</body>
</html>