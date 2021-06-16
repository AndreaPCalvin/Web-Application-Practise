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
		Grupos
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
		<div id="content">
			<form action="buscarGrupo" method="GET">
				<label>Buscar grupo:  </label><input type="text" name="nombre">
				<button class="buttonBuscar" type="submit"></button>
			</form>
			
			<?php
				if(isset($_SESSION["login"])) {
						
						echo "<button class='buttonDefault' onclick=\"location.href='crear_grupo'\">Nuevo grupo</button>";
						echo "<button class='buttonDefault' onclick=\"location.href='mis_grupos'\">Mis grupos</button>";
				}	
						


				 $grupos = DAOGrupo::listarPublico();

				$user = NULL;
				if(isset($_SESSION["login"])){
					$user = $_SESSION["usuario"];
				}
				 if($user == NULL){
					echo '<p id="content"> No estás logueado.</p>';
				 }
				 
				echo'<h2 class="content">Grupos públicos del foro:</h2>';
				 
				 if($grupos == NULL){

					echo "<p>No hay grupos disponibles</p>";
					

				 }else{
					
					echo "<div class='cuadricula'>";
					for ($i=0; $i < sizeof($grupos); $i++) { 
						
						
						$idGrupo = $grupos[$i]->getidGrupo();
						$nomGrupo  = $grupos[$i]->getnombreGrupo();
						

						
						if($user != NULL){
							
							if(DAOMiembro::isMember($user,$idGrupo)){
								echo "<div>".$nomGrupo."<br><button class='buttonDefault' id='miBoton' onclick=\"location.href='GrupoConcreto?id=".$idGrupo."'\">Ver</button></div>";
							}else{
								echo "<div>".$nomGrupo."<br><button class='buttonDefault' id='miBoton' onclick=\"location.href='solicitar_union?id=".$idGrupo."'\">Unirse</button></div>";
							}
							
						}else{
							echo "<div>".$nomGrupo."</div>";
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