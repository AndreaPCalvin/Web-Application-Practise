<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOGrupo as DAOGrupo;
use es\fdi\ucm\aw\DAOMiembro as DAOMiembro;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/gruposForo.css">
	<title>
		Buscar Grupo
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
			<h2 class="content">Código de colores: </h2>
			<p class="content"><button class='buttonGrupo' id='miembro'>Dorado: eres miembro</button>			
			<br><button class='buttonGrupo' disabled>Plateado: solo puedes unirte con invitación</button>
			<br><button class='buttonGrupo' id='nomiembro'>Cobre: puedes unirte</button></p>
			<?php


			   $nombre = htmlspecialchars(trim(strip_tags($_GET['nombre'])));
			   $grupos = DAOGrupo::listarPorNombre($nombre);

			   if($grupos == NULL){
				echo "<p class='content'>No existe ningún grupo que contenga: ".$nombre."</p>";
			   }
			   else{
				$user = NULL;
				if(isset($_SESSION["login"])){
					$user = $_SESSION["usuario"];
				}
				if($user == NULL){
					echo '<p class="content">No estás logueado</p>';
					echo '<p class="content">Inicia sesión para acceder a los grupos.</p>';
				}
				echo "<div class='cuadricula'>";
					for ($i=0; $i < sizeof($grupos); $i++) { 

						$idGrupo = $grupos[$i]->getidGrupo();
						$nomGrupo  = $grupos[$i]->getnombreGrupo();
						if($user != NULL){
							if($grupos[$i]->gettipo() == "publico"){
								if(DAOMiembro::isMember($user,$idGrupo)){
										echo "<div><button class='buttonGrupo' id='miembro' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">".$nomGrupo."</button></div>";
								}else{
										echo "<div><button class='buttonGrupo' id='nomiembro' onclick=\"location.href='solicitar_union?id=".$idGrupo."'\" >¡Únete a ".$nomGrupo."!</button></div>";
								}

							}else{
								if(DAOMiembro::isMember($user,$idGrupo)){
										echo "<div><button class='buttonGrupo' id='miembro' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">".$nomGrupo." <img id='candado' src='media/css/unlock.png'></button></div>";
								}else{
										echo "<div><button class='buttonGrupo' disabled>".$nomGrupo." <img id='candado' src='media/css/lock.png'></button> </div>";	
								}
								
							}
							
						}else{
							echo "<div><button class='buttonGrupo' disabled>".$nomGrupo."</button></div>";
						}
						
					}
				echo "</div>";
			   }

			?>
		</div>
	</div>
</div>
</body>
</html>